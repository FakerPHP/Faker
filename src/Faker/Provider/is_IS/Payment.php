<?php

namespace Faker\Provider\is_IS;

use Faker\Calculator\Iban;

/**
 * Iceland Payment Provider
 *
 * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number
 */
class Payment extends \Faker\Provider\Payment
{
    /**
     * Weights for Icelandic kennitala check digit calculation
     *
     * @var int[]
     */
    private static $kennitalaWeights = [3, 2, 7, 6, 5, 4, 3, 2];

    /**
     * International Bank Account Number (IBAN) for Iceland
     *
     * Icelandic IBAN structure: IS + 2 check digits + 22 digit BBAN
     * BBAN structure: 4 digit bank code + 2 digit branch + 6 digit account + 10 digit kennitala
     *
     * The kennitala has a check digit at position 9.
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always IS)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 22)
     *
     * @return string
     */
    public static function iban($countryCode = null, $prefix = '', $length = null)
    {
        // Bank code (4 digits)
        if ($prefix !== '' && strlen($prefix) >= 4) {
            $bankCode = substr($prefix, 0, 4);
            $prefix = substr($prefix, 4);
        } else {
            $bankCode = static::numerify('####');
        }

        // Branch code (2 digits)
        $branchCode = static::numerify('##');

        // Account number (6 digits)
        $accountNumber = static::numerify('######');

        // Generate kennitala (10 digits) with valid check digit
        $kennitala = static::generateValidKennitala();

        // Assemble BBAN
        $bban = $bankCode . $branchCode . $accountNumber . $kennitala;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('IS00' . $bban);

        return 'IS' . $checksum . $bban;
    }

    /**
     * Generate a 10-digit kennitala with valid check digit at position 9
     *
     * Kennitala structure: DDMMYY-RRRC + century digit
     * - DD = day (01-31)
     * - MM = month (01-12)
     * - YY = year
     * - RR = random (2 digits at positions 7-8)
     * - C = check digit at position 9
     * - Century digit at position 10 (9=1900s, 0=2000s)
     *
     * @return string 10-digit kennitala
     */
    protected static function generateValidKennitala(): string
    {
        // Generate DDMMYY (6 digits) - use realistic date
        $day = str_pad(mt_rand(1, 28), 2, '0', STR_PAD_LEFT);
        $month = str_pad(mt_rand(1, 12), 2, '0', STR_PAD_LEFT);
        $year = str_pad(mt_rand(50, 99), 2, '0', STR_PAD_LEFT);

        // Random digits (2 digits at positions 7-8)
        $random = static::numerify('##');

        // First 8 digits
        $base = $day . $month . $year . $random;

        // Calculate check digit (position 9) using MOD 11
        $checkDigit = Iban::mod11($base, self::$kennitalaWeights);

        if ($checkDigit === null) {
            return static::generateValidKennitala();
        }

        // Century digit (9 for 1900s)
        $century = '9';

        return $base . $checkDigit . $century;
    }

    /**
     * International Bank Account Number (IBAN)
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $prefix      for generating bank account number of a specific bank
     * @param string $countryCode ISO 3166-1 alpha-2 country code
     * @param int    $length      total length without country code and 2 check digits
     *
     * @return string
     */
    public static function bankAccountNumber($prefix = '', $countryCode = 'IS', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
