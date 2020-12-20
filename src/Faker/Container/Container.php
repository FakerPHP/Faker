<?php

declare(strict_types=1);

namespace Faker\Container;

use Psr\Container\ContainerInterface;

/**
 * A simple implementation of a container.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class Container implements ContainerInterface
{
    /**
     * @var array<string, callable|string|object>
     */
    private $definitions = [];
    private $services = [];

    public function __construct(array $definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * @throws NotInContainerException
     * @throws ContainerException
     */
    public function get($id)
    {
        if (!is_string($id)) {
            throw new \InvalidArgumentException(sprintf(
                'First argument of %s::get() must be string', 
                self::class
            ));
        }

        if (isset($this->services[$id])) {
            return $this->services[$id];
        }

        if (!$this->has($id)) {
            throw new NotInContainerException(sprintf(
                'There is not service with id "%s" in the container.', 
                $id
            ));
        }

        $definition = $this->definitions[$id];

        if (is_string($definition)) {
            if (!class_exists($definition)) {
                throw new ContainerException(sprintf(
                    'Could not instantiate class "%s". Class was not found.', 
                    $id
                ));
            }

            try {
                return $this->services[$id] = new $definition();
            } catch (\Throwable $e) {
                throw new ContainerException(sprintf('Could not instantiate class "%s"', $id), 0, $e);
            }
        }

        if (is_callable($definition)) {
            try {
                return $this->services[$id] = $definition();
            } catch (\Throwable $e) {
                throw new ContainerException(sprintf('Error while invoking callable for "%s"', $id), 0, $e);
            }
        }

        if (is_object($definition)) {
            return $this->services[$id] = $definition;
        }

        throw new ContainerException(sprintf('Invalid type for definition with id "%s"', $id));
    }

    /**
     * @throws \LogicException
     */
    public function has($id)
    {
        if (!is_string($id)) {
            throw new \LogicException(sprintf('First argument of %s::get() must be string', __CLASS__));
        }

        return array_key_exists($id, $this->definitions);
    }
}
