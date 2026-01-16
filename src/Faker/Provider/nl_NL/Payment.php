<?php

namespace Faker\Provider\nl_NL;

use Faker\Calculator\Iban;

class Payment extends \Faker\Provider\Payment
{
    /**
     * Dutch bank codes (BIC prefixes) that use the 11-test
     *
     * Note: ING (INGB) uses a different validation scheme and is excluded.
     *
     * @var string[]
     */
    protected static $bankCodes = [
        'ABNA', // ABN AMRO
        'RABO', // Rabobank
        'SNSB', // SNS Bank
        'TRIO', // Triodos
        'KNAB', // Knab
        'BUNQ', // Bunq
        'ASNB', // ASN Bank
        'RBRB', // RegioBank
    ];

    /**
     * International Bank Account Number (IBAN) for Netherlands
     *
     * Dutch IBAN structure: NL + 2 check digits + 14 character BBAN
     * BBAN structure: 4 letter bank code + 10 digit account number
     *
     * The account number must pass the 11-test (elfproef).
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     * @see https://nl.wikipedia.org/wiki/Elfproef
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always NL)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 14)
     *
     * @return string
     */
    public static function iban($countryCode = null, $prefix = '', $length = null)
    {
        // Bank code (4 letters)
        if ($prefix !== '' && strlen($prefix) >= 4) {
            $bankCode = strtoupper(substr($prefix, 0, 4));
            $prefix = substr($prefix, 4);
        } else {
            $bankCode = static::randomElement(static::$bankCodes);
        }

        // Generate account number that passes 11-test
        if ($prefix !== '' && strlen($prefix) === 10) {
            $accountNumber = $prefix;
        } else {
            $accountNumber = static::generateValidAccountNumber();
        }

        // Assemble BBAN
        $bban = $bankCode . $accountNumber;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('NL00' . $bban);

        return 'NL' . $checksum . $bban;
    }

    /**
     * Generate a 10-digit account number that passes the 11-test
     *
     * @see https://nl.wikipedia.org/wiki/Elfproef
     *
     * @return string 10-digit account number
     */
    protected static function generateValidAccountNumber(): string
    {
        // Generate first 9 digits randomly
        $digits = [];

        for ($i = 0; $i < 9; ++$i) {
            $digits[] = mt_rand(0, 9);
        }

        // Calculate the check digit (position 10, weight 1)
        // Sum = d1*10 + d2*9 + d3*8 + ... + d9*2 + d10*1
        // We need (sum + d10) % 11 == 0
        $sum = 0;

        for ($i = 0; $i < 9; ++$i) {
            $sum += $digits[$i] * (10 - $i);
        }

        // Find check digit: (sum + checkDigit) % 11 == 0
        $checkDigit = (11 - ($sum % 11)) % 11;

        // If check digit is 10, regenerate (can't represent with single digit)
        if ($checkDigit === 10) {
            return static::generateValidAccountNumber();
        }

        $digits[] = $checkDigit;

        return implode('', $digits);
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'NL', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
