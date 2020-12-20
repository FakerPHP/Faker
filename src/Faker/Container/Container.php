<?php

declare(strict_types=1);

namespace Faker\Container;

use Psr\Container\ContainerInterface;

/**
 * A simple implementation of a container.
 *
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class Container implements ContainerInterface
{
    /**
     * @var array<string, callable|string|object>
     */
    private $definitions;
    private $services = [];

    public function __construct(array $definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * @throws NotInContainerException
     * @throws ContainerException
     * @throws \InvalidArgumentException
     */
    public function get($id)
    {
        if (!is_string($id)) {
            throw new \InvalidArgumentException(sprintf(
                'First argument of %s::get() must be string',
                self::class
            ));
        }

        if (array_key_exists($id, $this->services)) {
            return $this->services[$id];
        }

        if (!$this->has($id)) {
            throw new NotInContainerException(sprintf(
                'There is not service with id "%s" in the container.',
                $id
            ));
        }

        $definition = $this->definitions[$id];

        if (is_callable($definition)) {
            try {
                $service = $definition();
            } catch (\Throwable $e) {
                throw new ContainerException(sprintf('Error while invoking callable for "%s"', $id), 0, $e);
            }
        } elseif (is_object($definition)) {
            $service = $definition;
        } elseif (is_string($definition)) {
            if (!class_exists($definition)) {
                throw new ContainerException(sprintf(
                    'Could not instantiate class "%s". Class was not found.',
                    $id
                ));
            }

            try {
                $service = new $definition();
            } catch (\Throwable $e) {
                throw new ContainerException(sprintf('Could not instantiate class "%s"', $id), 0, $e);
            }
        } else {
            throw new ContainerException(sprintf('Invalid type for definition with id "%s"', $id));
        }

        $this->services[$id] = $service;

        return $service;
    }

    /**
     * @throws \LogicException
     */
    public function has($id)
    {
        if (!is_string($id)) {
            throw new \LogicException(sprintf('First argument of %s::get() must be string', self::class));
        }

        return array_key_exists($id, $this->definitions);
    }
}
