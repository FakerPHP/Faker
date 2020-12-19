<?php

declare(strict_types=1);

namespace Faker\Container;

use Faker\English\FileExtension;
use Faker\Extension\File;
use Psr\Container\ContainerInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class ContainerBuilder
{
    /**
     * @var array<string, string|callable|object>
     */
    private $container = [];

    /**
     * @param string|callable|object $value
     * @param string|null $name
     *
     * @throws \LogicException
     */
    public function add($value, string $name = null): self
    {
        if (!is_string($value) && !is_callable($value) && !is_object($value)) {
            throw new \LogicException(sprintf('First argument to "%s::add()" must be a string, callable or object.', __CLASS__));
        }

        if ($name === null) {
            if (is_string($value)) {
                $name = $value;
            } elseif (is_object($value)) {
                $name = get_class($value);
            } else {
                throw new \LogicException(sprintf(
                    'Second argument to "%s::add()" is required not passing a string or object as first argument',
                    __CLASS__
                ));
            }
        }

        $this->container[$name] = $value;

        return $this;
    }

    public function build(): ContainerInterface
    {
        return new Container($this->container);
    }

    /**
     * Get an array with extension that represent the default English
     * functionality.
     */
    public static function getDefaultExtensions(): array
    {
        return [
            File::class => FileExtension::class
        ];
    }

    public static function getDefault(): ContainerInterface
    {
        $self = new self();
        foreach (self::getDefaultExtensions() as $id => $definition) {
            $self->add($definition, $id);
        }

        return $self->build();
    }
}
