<?php

declare(strict_types=1);

namespace Faker\Test\Container;

use Faker\Container\Container;
use Faker\Container\ContainerException;
use Faker\Core\File;
use Faker\Test;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * @covers \Faker\Container\Container
 */
final class ContainerTest extends TestCase
{
    public function testHasThrowsInvalidArgumentExceptionWhenIdentifierIsNotAString(): void
    {
        $container = new Container([]);

        $this->expectException(\InvalidArgumentException::class);

        $container->has(false);
    }

    public function testHasReturnsFalseWhenContainerDoesNotHaveDefinitionForService(): void
    {
        $container = new Container([]);

        self::assertFalse($container->has('foo'));
    }

    public function testGetThrowsInvalidArgumentExceptionWhenIdentifierIsNotAString(): void
    {
        $container = new Container([]);

        $this->expectException(\InvalidArgumentException::class);

        $container->get(false);
    }

    public function testGetThrowsNotFoundExceptionWhenContainerDoesNotHaveDefinitionForService(): void
    {
        $container = new Container([]);

        $this->expectException(NotFoundExceptionInterface::class);

        $container->get('foo');
    }

    public function testGetFromString(): void
    {
        $container = new Container([
            'file' => File::class,
        ]);

        $object = $container->get('file');

        self::assertInstanceOf(File::class, $object);
    }

    public function testGetThrowsRuntimeExceptionWhenServiceCouldNotBeResolvedFromCallable(): void
    {
        $id = 'foo';

        $container = new Container([
            $id => static function (): void {
                throw new \RuntimeException();
            },
        ]);

        $this->expectException(ContainerException::class);
        $this->expectExceptionMessage(sprintf(
            'Error while invoking callable for "%s"',
            $id,
        ));

        $container->get($id);
    }

    public function testGetThrowsRuntimeExceptionWhenServiceCouldNotBeResolvedFromClass(): void
    {
        $id = 'foo';

        $container = new Container([
            $id => Test\Fixture\Container\UnconstructableClass::class,
        ]);

        $this->expectException(ContainerException::class);
        $this->expectExceptionMessage(sprintf(
            'Could not instantiate class "%s"',
            $id,
        ));

        $container->get($id);
    }

    /**
     * @dataProvider provideDefinitionThatDoesNotResolveToObject
     */
    public function testGetThrowsRuntimeExceptionWhenServiceResolvedForIdentifierIsNotAnObject(\Closure $definition): void
    {
        $id = 'file';

        $container = new Container([
            $id => $definition,
        ]);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(sprintf(
            'Service resolved for identifier "%s" is not an object.',
            $id,
        ));

        $container->get($id);
    }

    /**
     * @dataProvider provideDefinitionThatDoesNotResolveToObject
     */
    public function testGetThrowsRuntimeExceptionWhenServiceResolvedForIdentifierIsNotAnObjectOnSecondTry(\Closure $definition): void
    {
        $id = 'file';

        $container = new Container([
            $id => $definition,
        ]);

        try {
            $container->get($id);
        } catch (\RuntimeException $e) {
            // do nothing
        }

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(sprintf(
            'Service resolved for identifier "%s" is not an object.',
            $id,
        ));

        $container->get($id);
    }

    /**
     * @return \Generator<string, array{0: \Closure}>
     */
    public function provideDefinitionThatDoesNotResolveToObject(): \Generator
    {
        $values = [
            'array' => [],
            'bool-false' => false,
            'bool-true' => true,
            'float' => 3.14,
            'int' => 9000,
            'null' => null,
            'resource' => fopen(__FILE__, 'r'),
            'string' => 'foo-bar-baz',
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                static function () use ($value) {
                    return $value;
                },
            ];
        }
    }

    public function testGetFromNoClassString(): void
    {
        $container = new Container([
            'file' => 'this is not a class',
        ]);

        $this->expectException(ContainerExceptionInterface::class);

        $container->get('file');
    }

    public function testGetFromCallable(): void
    {
        $container = new Container([
            'file' => static function () {
                return new File();
            },
        ]);

        $object = $container->get('file');

        self::assertInstanceOf(File::class, $object);
    }

    public function testGetFromObjectThatIsAnExtension(): void
    {
        $container = new Container([
            'file' => new File(),
        ]);

        $object = $container->get('file');

        self::assertInstanceOf(File::class, $object);
    }

    public function testGetFromObjectThatIsNotAnExtension(): void
    {
        $object = new \stdClass();

        $container = new Container([
            'file' => $object,
        ]);

        self::assertSame($object, $container->get('file'));

    }

    public function testGetFromNull(): void
    {
        $container = new Container([
            'file' => null,
        ]);

        $this->expectException(ContainerExceptionInterface::class);

        $container->get('file');
    }

    public function testGetSameObject(): void
    {
        $container = new Container([
            'file' => File::class,
        ]);

        $service = $container->get('file');

        self::assertSame($service, $container->get('file'), 'The container should only instantiate a service once.');
    }
}
