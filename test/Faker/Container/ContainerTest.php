<?php

declare(strict_types=1);

namespace Faker\Container;

use Faker\English\FileExtension;
use Faker\Test\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

final class ContainerTest extends TestCase
{
    public function testGetNonExisting()
    {
        $container = new Container(['file' => FileExtension::class]);
        self::assertFalse($container->has('foo'));
        $this->expectException(NotFoundExceptionInterface::class);
        $container->get('foo');
    }

    public function testGetFromString()
    {
        $container = new Container(['file' => FileExtension::class]);
        $object = $container->get('file');

        self::assertInstanceOf(FileExtension::class, $object);
    }

    public function testGetFromNoClassString()
    {
        $container = new Container(['file' => 'this is not a class']);
        $this->expectException(ContainerExceptionInterface::class);
        $container->get('file');
    }

    public function testGetFromCallable()
    {
        $container = new Container(['file' => \Closure::fromCallable(function () {
            return new FileExtension();
        })]);
        $object = $container->get('file');

        self::assertInstanceOf(FileExtension::class, $object);
    }

    public function testGetFromObject()
    {
        $container = new Container(['file' => new FileExtension()]);
        $object = $container->get('file');

        self::assertInstanceOf(FileExtension::class, $object);
    }

    public function testGetFromNull()
    {
        $container = new Container(['file' => null]);
        $this->expectException(ContainerExceptionInterface::class);
        $container->get('file');
    }

    public function testGetSameObject()
    {
        $container = new Container(['file' => FileExtension::class]);
        $objectA = $container->get('file');
        $hashA = spl_object_hash($objectA);
        $objectB = $container->get('file');
        $hashB = spl_object_hash($objectB);

        self::assertSame($hashA, $hashB, 'The container should only instantiate a service once.');
    }
}
