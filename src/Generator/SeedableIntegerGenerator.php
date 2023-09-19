<?php

declare(strict_types=1);

namespace Faker\Generator;

/**
 * @experimental
 */
interface SeedableIntegerGenerator extends IntegerGenerator
{
    /**
     * Seeds the number generator.
     */
    public function seed(int $value): void;
}
