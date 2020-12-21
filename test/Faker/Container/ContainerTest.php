<?php

declare(strict_types=1);

namespace Faker\Container;

use Faker\Core\File;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

final class ContainerTest extends TestCase
{
    public function testHasReturnsFalseWhenContainerDoesNotHaveDefinitionForService(): void
    {
        $container = new Container([]);

        self::assertFalse($container->has('foo'));
    }

    public function testGetThrowsNotFoundExceptionWhenContainerDoesNotHaveDefinitionForService(): void
    {
        $container = new Container([]);

        $this->expectException(NotFoundExceptionInterface::class);

        $container->get('foo');
    }

    public function testGetFromString(): void
    {
        $container = new Container(['file' => File::class]);
        $object = $container->get('file');

        self::assertInstanceOf(File::class, $object);
    }

    public function testGetFromNoClassString(): void
    {
        $container = new Container(['file' => 'this is not a class']);
        $this->expectException(ContainerExceptionInterface::class);
        $container->get('file');
    }

    public function testGetFromCallable(): void
    {
        $container = new Container(['file' => static function () {
            return new File();
        }]);
        $object = $container->get('file');

        self::assertInstanceOf(File::class, $object);
    }

    public function testGetFromObject(): void
    {
        $container = new Container(['file' => new File()]);
        $object = $container->get('file');

        self::assertInstanceOf(File::class, $object);
    }

    public function testGetFromNull(): void
    {
        $container = new Container(['file' => null]);

        $this->expectException(ContainerExceptionInterface::class);

        $container->get('file');
    }

    public function testGetSameObject(): void
    {
        $container = new Container(['file' => File::class]);

        $service = $container->get('file');

        self::assertSame($service, $container->get('file'), 'The container should only instantiate a service once.');
    }
}
