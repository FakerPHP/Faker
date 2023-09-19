<?php

declare(strict_types=1);

namespace Faker\Core;

use Faker\Extension;
use Faker\Generator;

/**
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class Number implements Extension\NumberExtension
{
    private Generator\IntegerGenerator $integerGenerator;

    public function __construct(Generator\IntegerGenerator $integerGenerator)
    {
        $this->integerGenerator = $integerGenerator;
    }

    public function numberBetween(int $min = 0, int $max = 2147483647): int
    {
        $int1 = min($min, $max);
        $int2 = max($min, $max);

        return $this->integerGenerator->integerBetween($int1, $int2);
    }

    public function randomDigit(): int
    {
        return $this->integerGenerator->integerBetween(0, 9);
    }

    public function randomDigitNot(int $except): int
    {
        $result = $this->integerGenerator->integerBetween(0, 8);

        if ($result >= $except) {
            ++$result;
        }

        return $result;
    }

    public function randomDigitNotZero(): int
    {
        return $this->integerGenerator->integerBetween(1, 9);
    }

    public function randomFloat(?int $nbMaxDecimals = null, float $min = 0, ?float $max = null): float
    {
        if (null === $nbMaxDecimals) {
            $nbMaxDecimals = $this->integerGenerator->integerBetween(0, 9);
        }

        if (null === $max) {
            $max = $this->integerGenerator->integer();

            if ($min > $max) {
                $max = $min;
            }
        }

        if ($min > $max) {
            $tmp = $min;
            $min = $max;
            $max = $tmp;
        }

        return round($min + $this->integerGenerator->integer() / $this->integerGenerator->largestInteger() * ($max - $min), $nbMaxDecimals);
    }

    public function randomNumber(int $nbDigits = null, bool $strict = false): int
    {
        if (null === $nbDigits) {
            $nbDigits = $this->integerGenerator->integerBetween(1, 9);
        }
        $max = 10 ** $nbDigits - 1;

        $largestInteger = $this->integerGenerator->largestInteger();

        if ($max > $largestInteger) {
            throw new \InvalidArgumentException(sprintf(
                'randomNumber() can only generate numbers up to %d.',
                $largestInteger,
            ));
        }

        if ($strict) {
            return $this->integerGenerator->integerBetween(10 ** ($nbDigits - 1), $max);
        }

        return $this->integerGenerator->integerBetween(0, $max);
    }
}
