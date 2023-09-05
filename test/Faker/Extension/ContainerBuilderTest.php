<?php

declare(strict_types=1);

namespace Faker\Test\Extension;

use Faker\Container\ContainerBuilder;
use Faker\Core\File;
use Faker\Core\Number;
use Faker\Extension;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Faker\Container\ContainerBuilder
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
        $containerBuilder = new ContainerBuilder();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf(
            'First argument to "%s::add()" must be a string, callable or object.',
            ContainerBuilder::class,
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
        $builder = new ContainerBuilder();

        $container = $builder->build();

        self::assertFalse($container->has('foo'));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasDefinitions(): void
    {
        $id = 'foo';
        $definition = File::class;

        $builder = new ContainerBuilder();

        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertInstanceOf($definition, $container->get($id));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasOverriddenDefinitions(): void
    {
        $id = 'foo';
        $definition = Number::class;

        $builder = new ContainerBuilder();

        $builder->add($id, File::class);
        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertInstanceOf($definition, $container->get($id));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasObjectAsDefinition(): void
    {
        $id = 'foo';
        $definition = new File();

        $builder = new ContainerBuilder();

        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertSame($definition, $container->get($id));
    }

    public function testBuildReturnsContainerWhenContainerBuilderHasCallableAsDefinition(): void
    {
        $id = 'foo';
        $definition = static function (): File {
            return new File();
        };

        $builder = new ContainerBuilder();

        $builder->add($id, $definition);

        $container = $builder->build();

        self::assertTrue($container->has($id));
        self::assertEquals($definition(), $container->get($id));
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
