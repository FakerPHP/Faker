<?php

namespace Faker\Calculator;

class Iban
{
    /**
     * Generates IBAN Checksum
     *
     * @return string Checksum (numeric string)
     */
    public static function checksum(string $iban)
    {
        // Move first four digits to end and set checksum to '00'
        $checkString = substr($iban, 4) . substr($iban, 0, 2) . '00';

        // Replace all letters with their number equivalents
        $checkString = preg_replace_callback(
            '/[A-Z]/',
            static function (array $matches): string {
                return (string) self::alphaToNumber($matches[0]);
            },
            $checkString,
        );

        // Perform mod 97 and subtract from 98
        $checksum = 98 - self::mod97($checkString);

        return str_pad($checksum, 2, '0', STR_PAD_LEFT);
    }

    /**
     * Converts letter to number
     *
     * @return int
     */
    public static function alphaToNumber(string $char)
    {
        return ord($char) - 55;
    }

    /**
     * Calculates mod97 on a numeric string
     *
     * @param string $number Numeric string
     *
     * @return int
     */
    public static function mod97(string $number)
    {
        $checksum = (int) $number[0];

        for ($i = 1, $size = strlen($number); $i < $size; ++$i) {
            $checksum = (10 * $checksum + (int) $number[$i]) % 97;
        }

        return $checksum;
    }

    /**
     * Checks whether an IBAN has a valid checksum
     *
     * @return bool
     */
    public static function isValid(string $iban)
    {
        return self::checksum($iban) === substr($iban, 2, 2);
    }

    /**
     * Calculate check digits using ISO 7064 MOD 97-10 algorithm
     *
     * This is used by many countries for their BBAN check digits.
     * Formula: (98 - mod97(number || '00')) % 97
     *
     * The % 97 at the end maps 97→00 and 98→01, which are equivalent
     * under mod 97 verification since (N + 98) ≡ (N + 01) ≡ 1 (mod 97).
     *
     * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number#Algorithms
     *
     * @param string $number Numeric string (bank code + account number)
     *
     * @return string 2 digit check digits (00-96)
     */
    public static function mod97_10(string $number): string
    {
        $check = (98 - self::mod97($number . '00')) % 97;

        return str_pad((string) $check, 2, '0', STR_PAD_LEFT);
    }

    /**
     * Convert alphanumeric string to numeric by replacing letters
     *
     * Used for calculating check digits on alphanumeric BBAN parts.
     * A=10, B=11, ..., Z=35 (same as IBAN letter substitution).
     *
     * @param string $string Alphanumeric string
     *
     * @return string Numeric string
     */
    public static function alphanumericToNumeric(string $string): string
    {
        return preg_replace_callback(
            '/[A-Z]/',
            static function (array $matches): string {
                return (string) self::alphaToNumber($matches[0]);
            },
            strtoupper($string),
        );
    }

    /**
     * Calculate check digit using weighted MOD 11 algorithm
     *
     * Used by Norway, Netherlands, Slovakia, Iceland, and other countries.
     * Formula: sum = Σ(digit[i] * weight[i]), check = 11 - (sum % 11)
     *
     * @param string $number  Numeric string to calculate check for
     * @param int[]  $weights Array of weights (must match length of $number)
     *
     * @return int|null Check digit (0-9), or null if would be 10 (invalid, must regenerate)
     */
    public static function mod11(string $number, array $weights): ?int
    {
        $sum = 0;
        $len = strlen($number);

        for ($i = 0; $i < $len; ++$i) {
            $sum += (int) $number[$i] * $weights[$i];
        }

        $check = 11 - ($sum % 11);

        if ($check === 11) {
            return 0;
        }

        if ($check === 10) {
            return null; // Invalid - must regenerate
        }

        return $check;
    }
}
