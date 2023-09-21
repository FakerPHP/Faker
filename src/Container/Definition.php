<?php

declare(strict_types=1);

namespace Faker\Container;

use Faker\Extension;

/**
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class Definition
{
    private \Closure $value;

    /**
     * @param \Closure(ContainerInterface):Extension\Extension $value
     */
    private function __construct(\Closure $value)
    {
        $this->value = $value;
    }

    /**
     * @param class-string<Extension\Extension> $className
     *
     * @throws \InvalidArgumentException
     */
    public static function fromClassName(string $className): Definition
    {
        if (!class_exists($className)) {
            throw new \InvalidArgumentException(sprintf(
                'Class "%s" does not exist.',
                $className,
            ));
        }

        $reflection = new \ReflectionClass($className);

        if ($reflection->hasMethod('__construct')) {
            $constructor = $reflection->getMethod('__construct');

            if ($constructor->getNumberOfRequiredParameters() > 0) {
                throw new \InvalidArgumentException(sprintf(
                    'Class "%s" has a constructor with required parameters.',
                    $className,
                ));
            }
        }

        return new self(static function () use ($className): object {
            return new $className();
        });
    }

    /**
     * @param \Closure(ContainerInterface):object $closure
     */
    public static function fromClosure(\Closure $closure): Definition
    {
        return new self(static function (ContainerInterface $container) use ($closure): object {
            return $closure($container);
        });
    }

    public static function fromObject(object $object): Definition
    {
        return new self(static function () use ($object): object {
            return $object;
        });
    }

    /**
     * @throws \RuntimeException
     */
    public function resolve(ContainerInterface $container): object
    {
        try {
            $resolved = ($this->value)($container);
        } catch (\Throwable $throwable) {
            throw new \RuntimeException(
                'An exception was thrown while trying to resolve a definition.',
                0,
                $throwable,
            );
        }

        return $resolved;
    }
}
