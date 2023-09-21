<?php

declare(strict_types=1);

namespace Faker\Test\Container;

use Faker\Container\ContainerBuilder;
use Faker\Container\Definition;
use Faker\Core\File;
use Faker\Core\Number;
use Faker\Extension;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Faker\Container\ContainerBuilder
 */
final class ContainerBuilderTest extends TestCase
{
    public function testBuildReturnsContainerWhenContainerBuilderDoesNotHaveDefinitions(): void
    {
        $builder = new ContainerBuilder();

        $container = $builder->build();

        self::assertFalse($container->has('foo'));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasDefinitions(): void
    {
        $id = 'foo';
        $definition = Definition::fromClassName(File::class);

        $builder = new ContainerBuilder();

        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertInstanceOf(File::class, $container->get($id));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasOverriddenDefinitions(): void
    {
        $id = 'foo';
        $definition = Definition::fromClassName(Number::class);

        $builder = new ContainerBuilder();

        $builder->add($id, Definition::fromClassName(File::class));
        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertInstanceOf(Number::class, $container->get($id));
    }

    public function testWithDefaultExtensionsReturnsContainerBuilderWithDefaultExtensions(): void
    {
        $builder = ContainerBuilder::withDefaultExtensions();

        $container = $builder->build();

        self::assertTrue($container->has(Extension\BarcodeExtension::class));
        self::assertTrue($container->has(Extension\BloodExtension::class));
        self::assertTrue($container->has(Extension\ColorExtension::class));
        self::assertTrue($container->has(Extension\DateTimeExtension::class));
        self::assertTrue($container->has(Extension\FileExtension::class));
        self::assertTrue($container->has(Extension\NumberExtension::class));
        self::assertTrue($container->has(Extension\UuidExtension::class));
        self::assertTrue($container->has(Extension\VersionExtension::class));
    }
}
