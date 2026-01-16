<?php

namespace Faker\Provider\nb_NO;

use Faker\Calculator\Iban;

/**
 * Norway Payment Provider
 *
 * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number
 */
class Payment extends \Faker\Provider\Payment
{
    /**
     * Weights for Norwegian MOD 11 check digit calculation
     *
     * @var int[]
     */
    private static $mod11Weights = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];

    /**
     * International Bank Account Number (IBAN) for Norway
     *
     * Norwegian IBAN structure: NO + 2 check digits + 11 digit BBAN
     * BBAN structure: 4 digit bank code + 6 digit account number + 1 check digit
     *
     * The check digit uses weighted MOD 11.
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always NO)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 11)
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

        // Account number (6 digits) - will have check digit appended
        if ($prefix !== '' && strlen($prefix) >= 6) {
            $accountNumber = substr($prefix, 0, 6);
        } else {
            $accountNumber = static::numerify('######');
        }

        // Calculate check digit using MOD 11
        $checkDigit = Iban::mod11($bankCode . $accountNumber, self::$mod11Weights);

        // If check digit is invalid (10), regenerate
        if ($checkDigit === null) {
            return static::iban($countryCode, '', $length);
        }

        // Assemble BBAN
        $bban = $bankCode . $accountNumber . $checkDigit;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('NO00' . $bban);

        return 'NO' . $checksum . $bban;
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'NO', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
