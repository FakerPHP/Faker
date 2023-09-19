<?php

declare(strict_types=1);

namespace Faker\Generator;

/**
 * @experimental
 */
interface IntegerGenerator
{
    /**
     * Returns an integer.
     */
    public function integer(): int;

    /**
     * Returns an integer that is between minimum and maximum (inclusive).
     *
     * @throws \InvalidArgumentException
     */
    public function integerBetween(int $minimum, int $maximum): int;

    /**
     * Returns the largest possible integer.
     */
    public function largestInteger(): int;
}
