<?php

declare(strict_types=1);

namespace Faker\Generator;

/**
 * @experimental
 */
final class MersenneTwisterIntegerGenerator implements SeedableIntegerGenerator
{
    public function integer(): int
    {
        return mt_rand();
    }

    public function integerBetween(int $minimum, int $maximum): int
    {
        if ($minimum > $maximum) {
            throw new \InvalidArgumentException(sprintf(
                'Minimum value %d should not be greater than the maximum value %d.',
                $minimum,
                $maximum,
            ));
        }

        return mt_rand($minimum, $maximum);
    }

    public function largestInteger(): int
    {
        return mt_getrandmax();
    }

    public function seed(int $value): void
    {
        mt_srand($value);
    }
}
