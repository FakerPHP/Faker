<?php

namespace Faker\Provider\sk_SK;

use Faker\Calculator\Iban;

/**
 * Slovakia Payment Provider
 *
 * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number
 */
class Payment extends \Faker\Provider\Payment
{
    /**
     * Weights for Slovak MOD 11 check digit calculation (account number)
     *
     * @var int[]
     */
    private static $accountWeights = [6, 3, 7, 9, 10, 5, 8, 4, 2];

    /**
     * Weights for Slovak MOD 11 check digit calculation (prefix)
     *
     * @var int[]
     */
    private static $prefixWeights = [10, 5, 8, 4, 2];

    /**
     * International Bank Account Number (IBAN) for Slovakia
     *
     * Slovak IBAN structure: SK + 2 check digits + 20 digit BBAN
     * BBAN structure: 4 digit bank code + 6 digit prefix + 10 digit account number
     *
     * Both prefix and account have embedded MOD 11 check digits.
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always SK)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 20)
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

        // Generate prefix (6 digits) with valid check digit
        $accountPrefix = static::generateValidPrefix();

        // Generate account number (10 digits) with valid check digit
        $accountNumber = static::generateValidAccount();

        // Assemble BBAN
        $bban = $bankCode . $accountPrefix . $accountNumber;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('SK00' . $bban);

        return 'SK' . $checksum . $bban;
    }

    /**
     * Generate a 6-digit prefix with valid MOD 11 check digit
     *
     * @return string 6-digit prefix
     */
    protected static function generateValidPrefix(): string
    {
        $base = static::numerify('#####');
        $checkDigit = Iban::mod11($base, self::$prefixWeights);

        if ($checkDigit === null) {
            return static::generateValidPrefix();
        }

        return $base . $checkDigit;
    }

    /**
     * Generate a 10-digit account number with valid MOD 11 check digit
     *
     * @return string 10-digit account number
     */
    protected static function generateValidAccount(): string
    {
        $base = static::numerify('#########');
        $checkDigit = Iban::mod11($base, self::$accountWeights);

        if ($checkDigit === null) {
            return static::generateValidAccount();
        }

        return $base . $checkDigit;
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'SK', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
