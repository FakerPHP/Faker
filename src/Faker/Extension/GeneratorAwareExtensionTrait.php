<?php

declare(strict_types=1);

namespace Faker\Extension;

use Faker\Generator;

/**
 * A helper trait to be used with GeneratorAwareExtension.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
trait GeneratorAwareExtensionTrait
{
    /**
     * @var Generator|null
     */
    private $generator = null;

    public function withGenerator(Generator $generator): self
    {
        $instance  = clone $this;

        $instance->generator = $generator;

        return $instance;
    }
}
