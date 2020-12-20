<?php

declare(strict_types=1);

namespace Faker\Test\Container;

use Faker\Container\ContainerBuilder;
use Faker\Core\File;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

final class ContainerBuilderTest extends TestCase
{
    public function testBuildEmpty()
    {
        $builder = new ContainerBuilder();
        $container = $builder->build();

        self::assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testBuild()
    {
        $builder = new ContainerBuilder();
        $builder->add(File::class);
        $container = $builder->build();

        self::assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testBuildWithDuplicates()
    {
        $builder = new ContainerBuilder();
        $builder->add(File::class);
        $builder->add(File::class);
        $container = $builder->build();

        self::assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testBuildWithObject()
    {
        $builder = new ContainerBuilder();
        $builder->add(new File(), 'foo');
        $container = $builder->build();

        self::assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testBuildWithCallable()
    {
        $builder = new ContainerBuilder();
        $builder->add(static function () {
            return new File();
        }, 'foo');
        $container = $builder->build();

        self::assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testBuildDefault()
    {
        $container = ContainerBuilder::getDefault();
        self::assertInstanceOf(ContainerInterface::class, $container);
    }
}
