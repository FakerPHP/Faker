<?php

declare(strict_types=1);

namespace Faker\Container;

use Faker\Core;
use Faker\Extension;

/**
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class ContainerBuilder
{
    /**
     * @var array<string, callable|object|string>
     */
    private array $definitions = [];

    /**
     * @param callable|object|string $definition
     *
     * @throws \InvalidArgumentException
     */
    public function add(string $id, $definition): self
    {
        if (!is_string($definition) && !is_callable($definition) && !is_object($definition)) {
            throw new \InvalidArgumentException(sprintf(
                'First argument to "%s::add()" must be a string, callable or object.',
                self::class,
            ));
        }

        $this->definitions[$id] = $definition;

        return $this;
    }

    public function build(): ContainerInterface
    {
        return new Container($this->definitions);
    }

    private static function defaultExtensions(): array
    {
        return [
            Extension\BarcodeExtension::class => static function (ContainerInterface $container): Extension\BarcodeExtension {
                return new Core\Barcode($container->get(Extension\NumberExtension::class));
            },
            Extension\BloodExtension::class => Core\Blood::class,
            Extension\ColorExtension::class => static function (ContainerInterface $container): Extension\ColorExtension {
                return new Core\Color($container->get(Extension\NumberExtension::class));
            },
            Extension\DateTimeExtension::class => Core\DateTime::class,
            Extension\FileExtension::class => Core\File::class,
            Extension\NumberExtension::class => Core\Number::class,
            Extension\VersionExtension::class => static function (ContainerInterface $container): Extension\VersionExtension {
                return new Core\Version($container->get(Extension\NumberExtension::class));
            },
            Extension\UuidExtension::class => static function (ContainerInterface $container): Extension\UuidExtension {
                return new Core\Uuid($container->get(Extension\NumberExtension::class));
            },
        ];
    }

    public static function withDefaultExtensions(): self
    {
        $instance = new self();

        foreach (self::defaultExtensions() as $id => $definition) {
            $instance->add($id, $definition);
        }

        return $instance;
    }
}
