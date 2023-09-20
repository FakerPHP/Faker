<?php

declare(strict_types=1);

namespace Faker\Test\Core\Container;

use Faker\Core;
use Faker\Extension;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Faker\Core\Container\ContainerBuilder
 */
final class ContainerBuilderTest extends TestCase
{
    /**
     * @dataProvider provideInvalidValue
     *
     * @param array|bool|float|int|resource|null $value
     */
    public function testAddRejectsInvalidValue($value): void
    {
        $containerBuilder = new Core\Container\ContainerBuilder();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf(
            'First argument to "%s::add()" must be a string, callable or object.',
            Core\Container\ContainerBuilder::class,
        ));

        $containerBuilder->add('foo', $value);
    }

    /**
     * @return \Generator<string, array{0: array|bool|float|int|resource|null}>
     */
    public function provideInvalidValue(): \Generator
    {
        $values = [
            'array' => [
                'foo',
                'bar',
                'baz',
            ],
            'bool-false' => false,
            'bool-true' => true,
            'float' => 3.14,
            'int' => 9001,
            'null' => true,
            'resource' => fopen(__FILE__, 'rb'),
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }

    public function testBuildReturnsContainerWhenContainerBuilderDoesNotHaveDefinitions(): void
    {
        $builder = new Core\Container\ContainerBuilder();

        $container = $builder->build();

        self::assertFalse($container->has('foo'));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasDefinitions(): void
    {
        $id = 'foo';
        $definition = Core\File::class;

        $builder = new Core\Container\ContainerBuilder();

        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertInstanceOf($definition, $container->get($id));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasOverriddenDefinitions(): void
    {
        $id = 'foo';
        $definition = Core\Number::class;

        $builder = new Core\Container\ContainerBuilder();

        $builder->add($id, Core\File::class);
        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertInstanceOf($definition, $container->get($id));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasObjectAsDefinition(): void
    {
        $id = 'foo';
        $definition = new Core\File();

        $builder = new Core\Container\ContainerBuilder();

        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertSame($definition, $container->get($id));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasCallableAsDefinition(): void
    {
        $id = 'foo';
        $definition = static function (): Core\File {
            return new Core\File();
        };

        $builder = new Core\Container\ContainerBuilder();

        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertEquals($definition(), $container->get($id));
    }

    public function testWithDefaultExtensionsReturnsContainerBuilderWithDefaultExtensions(): void
    {
        $builder = Core\Container\ContainerBuilder::withDefaultExtensions();

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
