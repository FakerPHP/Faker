<?php

declare(strict_types=1);

namespace Faker\Test\Container;

use Faker\Container\Container;
use Faker\Container\ContainerException;
use Faker\Container\Definition;
use Faker\Core\File;
use PHPUnit\Framework\TestCase;
use Psr\Container\NotFoundExceptionInterface;

/**
 * @covers \Faker\Container\Container
 */
final class ContainerTest extends TestCase
{
    public function testConstructorRejectsDefinitionsWithInvalidKeys(): void
    {
        $definitions = [
            'foo' => Definition::fromClassName(\stdClass::class),
            false => Definition::fromClassName(File::class),
        ];

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Keys of definitions should be strings.');

        new Container($definitions);
    }

    public function testConstructorRejectsDefinitionsWithInvalidValues(): void
    {
        $definitions = [
            'foo' => Definition::fromClassName(\stdClass::class),
            'bar' => new \stdClass(),
        ];

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf(
            'Values of definitions should be instances of %s.',
            Definition::class,
        ));

        new Container($definitions);
    }

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

    public function testGetThrowsContainerExceptionWhenServiceCouldNotBeResolvedForIdentifier(): void
    {
        $id = 'file';

        $previous = new \RuntimeException('Sorry, not sorry.');

        $container = new Container([
            $id => Definition::fromClosure(static function () use ($previous): void {
                throw $previous;
            }),
        ]);

        $this->expectException(ContainerException::class);
        $this->expectExceptionMessage(sprintf(
            'An exception was thrown while trying to resolve the service with id "%s".',
            $id,
        ));

        $container->get($id);
    }

    public function testGetThrowsRuntimeExceptionWhenServiceResolvedForIdentifierIsNotAnObject(): void
    {
        $id = 'file';

        $container = new Container([
            $id => Definition::fromClosure(static function (): array {
                return [];
            }),
        ]);

        $this->expectException(ContainerException::class);
        $this->expectExceptionMessage(sprintf(
            'An exception was thrown while trying to resolve the service with id "%s".',
            $id,
        ));

        $container->get($id);
    }

    public function testGetThrowsRuntimeExceptionWhenServiceResolvedForIdentifierIsNotAnExtensionOnSecondTry(): void
    {
        $id = 'file';

        $container = new Container([
            $id => Definition::fromClosure(static function (): array {
                return [];
            }),
        ]);

        try {
            $container->get($id);
        } catch (\RuntimeException $e) {
            // do nothing
        }

        $this->expectException(ContainerException::class);
        $this->expectExceptionMessage(sprintf(
            'An exception was thrown while trying to resolve the service with id "%s".',
            $id,
        ));

        $container->get($id);
    }

    public function testGetSameObject(): void
    {
        $container = new Container([
            'file' => Definition::fromClassName(File::class),
        ]);

        $service = $container->get('file');

        self::assertSame($service, $container->get('file'), 'The container should only instantiate a service once.');
    }
}
