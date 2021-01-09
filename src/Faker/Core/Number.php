<?php

declare(strict_types=1);

namespace Faker\Core;

use Faker\Extension;

/**
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class Number implements Extension\NumberExtension
{
    /**
     * Returns a random number between $int1 and $int2 (any order)
     *
     * @param int $int1 default to 0
     * @param int $int2 defaults to 32 bit max integer, ie 2147483647
     *
     * @example 79907610
     */
    public function numberBetween(int $int1 = 0, int $int2 = 2147483647): int
    {
        $min = $int1 < $int2 ? $int1 : $int2;
        $max = $int1 < $int2 ? $int2 : $int1;

        return mt_rand($min, $max);
    }

    /**
     * Returns a random number between 0 and 9
     */
    public function randomDigit(): int
    {
        return mt_rand(0, 9);
    }

    /**
     * Generates a random digit, which cannot be $except
     *
     * @param int $except
     */
    public function randomDigitNot(int $except): int
    {
        $result = self::numberBetween(0, 8);

        if ($result >= $except) {
            ++$result;
        }

        return $result;
    }

    /**
     * Returns a random number between 1 and 9
     */
    public function randomDigitNotNull(): int
    {
        return mt_rand(1, 9);
    }

    /**
     * Return a random float number
     *
     * @param int|null  $nbMaxDecimals
     * @param float|int $min
     * @param float|int $max
     *
     * @example 48.8932
     */
    public function randomFloat(int $nbMaxDecimals = null, float $min = 0, float $max = null): float
    {
        if (null === $nbMaxDecimals) {
            $nbMaxDecimals = $this->randomDigit();
        }

        if (null === $max) {
            $max = $this->randomNumber();

            if ($min > $max) {
                $max = $min;
            }
        }

        if ($min > $max) {
            $tmp = $min;
            $min = $max;
            $max = $tmp;
        }

        return round($min + mt_rand() / mt_getrandmax() * ($max - $min), $nbMaxDecimals);
    }

    /**
     * Returns a random integer with 0 to $nbDigits digits.
     *
     * The maximum value returned is mt_getrandmax()
     *
     * @param int|null $nbDigits Defaults to a random number between 1 and 9
     * @param bool     $strict   Whether the returned number should have exactly $nbDigits
     *
     * @example 79907610
     */
    public function randomNumber(int $nbDigits = null, bool $strict = false): int
    {
        if (!is_bool($strict)) {
            throw new \InvalidArgumentException('randomNumber() generates numbers of fixed width. To generate numbers between two boundaries, use numberBetween() instead.');
        }

        if (null === $nbDigits) {
            $nbDigits = $this->randomDigitNotNull();
        }
        $max = 10 ** $nbDigits - 1;

        if ($max > mt_getrandmax()) {
            throw new \InvalidArgumentException('randomNumber() can only generate numbers up to mt_getrandmax()');
        }

        if ($strict) {
            return mt_rand(10 ** ($nbDigits - 1), $max);
        }

        return mt_rand(0, $max);
    }
}
