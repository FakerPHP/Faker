<?php

declare(strict_types=1);

namespace Faker\Test\Container;

use Faker\Container;
use Faker\Test;
use PHPUnit\Framework;

/**
 * @covers \Faker\Container\Definition
 */
final class DefinitionTest extends Framework\TestCase
{
    public function testFromClassNameRejectsValueWhenClassDoesNotExist(): void
    {
        $className = 'FooBar9000';

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf(
            'Class "%s" does not exist.',
            $className,
        ));

        Container\Definition::fromClassName($className);
    }

    public function testFromClassNameRejectsValueWhenClassHasConstructorWithRequiredArguments(): void
    {
        $className = Test\Fixture\Container\ClassWithConstructorRequiringArguments::class;

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf(
            'Class "%s" has a constructor with required parameters.',
            $className,
        ));

        Container\Definition::fromClassName($className);
    }

    public function testFromClassNameReturnsDefinitionThatResolvesToInstanceOfClass(): void
    {
        $className = Test\Fixture\Container\ClassWithConstructorNotRequiringArguments::class;

        $definition = Container\Definition::fromClassName($className);

        $resolved = $definition->resolve($this->createStub(Container\ContainerInterface::class));

        self::assertInstanceOf($className, $resolved);
    }

    public function testFromClosureReturnsDefinitionThatResolvesToResultOfInvokingClosure(): void
    {
        $container = new Container\Container([]);

        $closure = static function (): Test\Fixture\Container\ClassWithConstructorNotRequiringArguments {
            return new Test\Fixture\Container\ClassWithConstructorNotRequiringArguments();
        };

        $definition = Container\Definition::fromClosure($closure);

        $resolved = $definition->resolve($container);

        self::assertEquals($closure(), $resolved);
    }

    public function testFromClosureReturnsDefinitionThatResolvesToResultOfInvokingClosureWhenClosureNeedsContainer(): void
    {
        $container = new Container\Container([
            Test\Fixture\Extension\BarExtension::class => Container\Definition::fromClosure(static function (): Test\Fixture\Extension\BarExtension {
                return new Test\Fixture\Extension\BarExtension();
            }),
        ]);

        $closure = static function (Container\ContainerInterface $container): Test\Fixture\Extension\FooExtension {
            return new Test\Fixture\Extension\FooExtension($container->get(Test\Fixture\Extension\BarExtension::class));
        };

        $definition = Container\Definition::fromClosure($closure);

        $resolved = $definition->resolve($container);

        self::assertEquals($closure($container), $resolved);
    }

    public function testFromObjectReturnsDefinitionThatResolvesToObject(): void
    {
        $object = new Test\Fixture\Container\ClassWithConstructorNotRequiringArguments();

        $definition = Container\Definition::fromObject($object);

        $resolved = $definition->resolve($this->createStub(Container\ContainerInterface::class));

        self::assertSame($object, $resolved);
    }

    public function testResolveThrowsRuntimeExceptionWhenDefinitionWasCreatedFromClosureThatThrowsException(): void
    {
        $previous = new \RuntimeException('Sorry, not sorry.');

        $definition = Container\Definition::fromClosure(static function () use ($previous): void {
            throw $previous;
        });

        try {
            $definition->resolve($this->createStub(Container\ContainerInterface::class));
        } catch (\RuntimeException $exception) {
            self::assertSame('An exception was thrown while trying to resolve a definition.', $exception->getMessage());
            self::assertSame(0, $exception->getCode());
            self::assertSame($previous, $exception->getPrevious());

            return;
        }

        self::fail(sprintf(
            'Expected a "%s" to be thrown.',
            \RuntimeException::class,
        ));
    }

    /**
     * @dataProvider provideValueThatIsNotAnObject
     */
    public function testResolveThrowsRuntimeExceptionWhenDefinitionWasCreatedFromClosureThatDoesNotReturnObject($value): void
    {
        $definition = Container\Definition::fromClosure(static function () use ($value) {
            return $value;
        });

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('An exception was thrown while trying to resolve a definition.');

        $definition->resolve($this->createStub(Container\ContainerInterface::class));
    }

    /**
     * @return \Generator<string, array{0: callable|object|string}>
     */
    public function provideValueThatIsNotAnObject(): \Generator
    {
        $values = [
            'array' => [],
            'bool' => true,
            'int' => 9000,
            'null' => null,
            'string' => \stdClass::class,
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }
}
