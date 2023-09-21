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
     * @var array<string, Definition>
     */
    private array $definitions = [];

    /**
     * @throws \InvalidArgumentException
     */
    public function add(string $id, Definition $definition): self
    {
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
            Extension\BarcodeExtension::class => Definition::fromClosure(static function (ContainerInterface $container): Extension\BarcodeExtension {
                return new Core\Barcode($container->get(Extension\NumberExtension::class));
            }),
            Extension\BloodExtension::class => Definition::fromClassName(Core\Blood::class),
            Extension\ColorExtension::class => Definition::fromClosure(static function (ContainerInterface $container): Extension\ColorExtension {
                return new Core\Color($container->get(Extension\NumberExtension::class));
            }),
            Extension\DateTimeExtension::class => Definition::fromClassName(Core\DateTime::class),
            Extension\FileExtension::class => Definition::fromClassName(Core\File::class),
            Extension\NumberExtension::class => Definition::fromClassName(Core\Number::class),
            Extension\VersionExtension::class => Definition::fromClosure(static function (ContainerInterface $container): Extension\VersionExtension {
                return new Core\Version($container->get(Extension\NumberExtension::class));
            }),
            Extension\UuidExtension::class => Definition::fromClosure(static function (ContainerInterface $container): Extension\UuidExtension {
                return new Core\Uuid($container->get(Extension\NumberExtension::class));
            }),
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
