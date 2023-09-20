<?php

declare(strict_types=1);

namespace Faker\Test\Core\Container;

use Faker\Core;
use Faker\Extension;
use Faker\Test;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * @covers \Faker\Core\Container\Container
 */
final class ContainerTest extends TestCase
{
    public function testHasThrowsInvalidArgumentExceptionWhenIdentifierIsNotAString(): void
    {
        $container = new Core\Container\Container([]);

        $this->expectException(\InvalidArgumentException::class);

        $container->has(false);
    }

    public function testHasReturnsFalseWhenContainerDoesNotHaveDefinitionForService(): void
    {
        $container = new Core\Container\Container([]);

        self::assertFalse($container->has('foo'));
    }

    public function testGetThrowsInvalidArgumentExceptionWhenIdentifierIsNotAString(): void
    {
        $container = new Core\Container\Container([]);

        $this->expectException(\InvalidArgumentException::class);

        $container->get(false);
    }

    public function testGetThrowsNotFoundExceptionWhenContainerDoesNotHaveDefinitionForService(): void
    {
        $container = new Core\Container\Container([]);

        $this->expectException(NotFoundExceptionInterface::class);

        $container->get('foo');
    }

    public function testGetFromString(): void
    {
        $container = new Core\Container\Container([
            'file' => Core\File::class,
        ]);

        $object = $container->get('file');

        self::assertInstanceOf(Core\File::class, $object);
    }

    public function testGetThrowsRuntimeExceptionWhenServiceCouldNotBeResolvedFromCallable(): void
    {
        $id = 'foo';

        $container = new Core\Container\Container([
            $id => static function (): void {
                throw new \RuntimeException();
            },
        ]);

        $this->expectException(Core\Container\ContainerException::class);
        $this->expectExceptionMessage(sprintf(
            'Error while invoking callable for "%s"',
            $id,
        ));

        $container->get($id);
    }

    public function testGetThrowsRuntimeExceptionWhenServiceCouldNotBeResolvedFromClass(): void
    {
        $id = 'foo';

        $container = new Core\Container\Container([
            $id => Test\Fixture\Core\Container\UnconstructableClass::class,
        ]);

        $this->expectException(Core\Container\ContainerException::class);
        $this->expectExceptionMessage(sprintf(
            'Could not instantiate class "%s"',
            $id,
        ));

        $container->get($id);
    }

    /**
     * @dataProvider provideDefinitionThatDoesNotResolveToExtension
     */
    public function testGetThrowsRuntimeExceptionWhenServiceResolvedForIdentifierIsNotAnExtension($definition): void
    {
        $id = 'file';

        $container = new Core\Container\Container([
            $id => $definition,
        ]);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(sprintf(
            'Service resolved for identifier "%s" does not implement the %s" interface.',
            $id,
            Extension\Extension::class,
        ));

        $container->get($id);
    }

    /**
     * @dataProvider provideDefinitionThatDoesNotResolveToExtension
     */
    public function testGetThrowsRuntimeExceptionWhenServiceResolvedForIdentifierIsNotAnExtensionOnSecondTry($definition): void
    {
        $id = 'file';

        $container = new Core\Container\Container([
            $id => $definition,
        ]);

        try {
            $container->get($id);
        } catch (\RuntimeException $e) {
            // do nothing
        }

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(sprintf(
            'Service resolved for identifier "%s" does not implement the %s" interface.',
            $id,
            Extension\Extension::class,
        ));

        $container->get($id);
    }

    /**
     * @return \Generator<string, array{0: callable|object|string}>
     */
    public function provideDefinitionThatDoesNotResolveToExtension(): \Generator
    {
        $definitions = [
            'callable' => static function (): \stdClass {
                return new \stdClass();
            },
            'object' => new \stdClass(),
            'string' => \stdClass::class,
        ];

        foreach ($definitions as $key => $definition) {
            yield $key => [
                $definition,
            ];
        }
    }

    public function testGetFromNoClassString(): void
    {
        $container = new Core\Container\Container([
            'file' => 'this is not a class',
        ]);

        $this->expectException(ContainerExceptionInterface::class);

        $container->get('file');
    }

    public function testGetFromCallable(): void
    {
        $container = new Core\Container\Container([
            'file' => static function () {
                return new Core\File();
            },
        ]);

        $object = $container->get('file');

        self::assertInstanceOf(Core\File::class, $object);
    }

    public function testGetFromObject(): void
    {
        $container = new Core\Container\Container([
            'file' => new Core\File(),
        ]);

        $object = $container->get('file');

        self::assertInstanceOf(Core\File::class, $object);
    }

    public function testGetFromNull(): void
    {
        $container = new Core\Container\Container([
            'file' => null,
        ]);

        $this->expectException(ContainerExceptionInterface::class);

        $container->get('file');
    }

    public function testGetSameObject(): void
    {
        $container = new Core\Container\Container([
            'file' => Core\File::class,
        ]);

        $service = $container->get('file');

        self::assertSame($service, $container->get('file'), 'The container should only instantiate a service once.');
    }
}
