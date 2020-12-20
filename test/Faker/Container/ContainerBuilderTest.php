<?php

declare(strict_types=1);

namespace Faker\Test\Container;

use Faker\Container\ContainerBuilder;
use Faker\English\FileExtension;
use Faker\Test\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
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
        $builder->add(FileExtension::class);
        $container = $builder->build();

        self::assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testBuildWithDuplicates()
    {
        $builder = new ContainerBuilder();
        $builder->add(FileExtension::class);
        $builder->add(FileExtension::class);
        $container = $builder->build();

        self::assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testBuildWithObject()
    {
        $builder = new ContainerBuilder();
        $builder->add(new FileExtension(), 'foo');
        $container = $builder->build();

        self::assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testBuildWithCallable()
    {
        $builder = new ContainerBuilder();
        $builder->add(static function () {
            return new FileExtension();
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
