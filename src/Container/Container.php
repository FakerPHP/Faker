<?php

declare(strict_types=1);

namespace Faker\Container;

/**
 * A simple implementation of a container.
 *
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class Container implements ContainerInterface
{
    /**
     * @var array<string, Definition>
     */
    private array $definitions;

    /**
     * @var array<string, object>
     */
    private array $services = [];

    /**
     * Create a container object with a set of definitions.
     *
     * @param array<string, Definition> $definitions
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $definitions)
    {
        $invalidIdentifiers = array_filter(array_keys($definitions), static function ($identifier): bool {
            return !is_string($identifier);
        });

        if ([] !== $invalidIdentifiers) {
            throw new \InvalidArgumentException('Keys of definitions should be strings.');
        }

        $invalidDefinitions = array_filter($definitions, static function ($definition): bool {
            return !$definition instanceof Definition;
        });

        if ([] !== $invalidDefinitions) {
            throw new \InvalidArgumentException(sprintf(
                'Values of definitions should be instances of %s.',
                Definition::class,
            ));
        }

        $this->definitions = $definitions;
    }

    /**
     * Retrieve a definition from the container.
     *
     * @param string $id
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @throws ContainerException
     * @throws NotInContainerException
     */
    public function get($id): object
    {
        if (!is_string($id)) {
            throw new \InvalidArgumentException(sprintf(
                'First argument of %s::get() must be string',
                self::class,
            ));
        }

        if (array_key_exists($id, $this->services)) {
            return $this->services[$id];
        }

        if (!$this->has($id)) {
            throw new NotInContainerException(sprintf(
                'There is not service with id "%s" in the container.',
                $id,
            ));
        }

        try {
            $service = $this->definitions[$id]->resolve($this);
        } catch (\Throwable $exception) {
            throw new ContainerException(
                sprintf(
                    'An exception was thrown while trying to resolve the service with id "%s".',
                    $id,
                ),
                0,
                $exception,
            );
        }

        $this->services[$id] = $service;

        return $service;
    }

    /**
     * Check if the container contains a given identifier.
     *
     * @param string $id
     *
     * @throws \InvalidArgumentException
     */
    public function has($id): bool
    {
        if (!is_string($id)) {
            throw new \InvalidArgumentException(sprintf(
                'First argument of %s::get() must be string',
                self::class,
            ));
        }

        return array_key_exists($id, $this->definitions);
    }
}
