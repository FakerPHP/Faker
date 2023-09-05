<?php

declare(strict_types=1);

namespace Faker\Extension;

use Faker\Generator;

/**
 * @experimental This trait is experimental and does not fall under our BC promise
 *
 * A helper trait to be used with GeneratorAwareExtension.
 */
trait GeneratorAwareExtensionTrait
{
    /**
     * @var Generator|null
     */
    private $generator;

    /**
     * @return static
     */
    public function withGenerator(Generator $generator): Extension
    {
        $instance = clone $this;

        $instance->generator = $generator;

        return $instance;
    }
}
