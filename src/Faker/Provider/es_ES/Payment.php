<?php

namespace Faker\Provider\es_ES;

use Faker\Calculator\Iban;

class Payment extends \Faker\Provider\Payment
{
    private static $vatMap = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'N', 'P', 'Q', 'R', 'S', 'U', 'V', 'W'];

    /**
     * Weights for Spanish MOD 11 calculation (right to left)
     *
     * @var int[]
     */
    private static $mod11Weights = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];

    /**
     * International Bank Account Number (IBAN) for Spain
     *
     * Spanish IBAN structure: ES + 2 check digits + 20 digit BBAN
     * BBAN structure: 4 digit bank code + 4 digit branch code + 2 control digits + 10 digit account
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     * @see https://es.wikipedia.org/wiki/C%C3%B3digo_cuenta_cliente
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always ES)
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

        // Branch code (4 digits)
        if ($prefix !== '' && strlen($prefix) >= 4) {
            $branchCode = substr($prefix, 0, 4);
            $prefix = substr($prefix, 4);
        } else {
            $branchCode = static::numerify('####');
        }

        // Account number (10 digits)
        if ($prefix !== '') {
            $accountNumber = str_pad(substr($prefix, 0, 10), 10, '0', STR_PAD_LEFT);
        } else {
            $accountNumber = static::numerify('##########');
        }

        // Calculate control digits
        $dc1 = static::calculateControlDigit('00' . $bankCode . $branchCode);
        $dc2 = static::calculateControlDigit($accountNumber);

        // Assemble BBAN
        $bban = $bankCode . $branchCode . $dc1 . $dc2 . $accountNumber;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('ES00' . $bban);

        return 'ES' . $checksum . $bban;
    }

    /**
     * Calculate Spanish control digit using MOD 11 algorithm
     *
     * @param string $digits 10 digit string
     *
     * @return string Single control digit (0-9)
     */
    protected static function calculateControlDigit(string $digits): string
    {
        $sum = 0;
        $digits = str_pad($digits, 10, '0', STR_PAD_LEFT);

        for ($i = 0; $i < 10; $i++) {
            $sum += (int) $digits[$i] * self::$mod11Weights[$i];
        }

        $remainder = $sum % 11;
        $digit = 11 - $remainder;

        // Special cases
        if ($digit === 11) {
            $digit = 0;
        } elseif ($digit === 10) {
            $digit = 1;
        }

        return (string) $digit;
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'ES', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }

    /**
     * Value Added Tax (VAT)
     *
     * @example 'B93694545'
     *
     * @see https://en.wikipedia.org/wiki/VAT_identification_number
     * @see https://es.wikipedia.org/wiki/C%C3%B3digo_de_identificaci%C3%B3n_fiscal
     *
     * @return string VAT Number
     */
    public static function vat()
    {
        $letter = static::randomElement(self::$vatMap);
        $number = static::numerify('########');

        return $letter . $number;
    }
}
