<?php

namespace Faker\Provider\fr_FR;

use Faker\Calculator\Iban;

class Payment extends \Faker\Provider\Payment
{
    /**
     * Mapping of letters to numbers for RIB key calculation
     *
     * @var array<string, string>
     */
    private static $ribLetterMap = [
        'A' => '1', 'B' => '2', 'C' => '3', 'D' => '4', 'E' => '5', 'F' => '6', 'G' => '7', 'H' => '8', 'I' => '9',
        'J' => '1', 'K' => '2', 'L' => '3', 'M' => '4', 'N' => '5', 'O' => '6', 'P' => '7', 'Q' => '8', 'R' => '9',
        'S' => '2', 'T' => '3', 'U' => '4', 'V' => '5', 'W' => '6', 'X' => '7', 'Y' => '8', 'Z' => '9',
    ];

    /**
     * Value Added Tax (VAT)
     *
     * @example 'FR12123456789', ('spaced') 'FR 12 123 456 789'
     *
     * @see http://ec.europa.eu/taxation_customs/vies/faq.html?locale=en#item_11
     * @see http://www.iecomputersystems.com/ordering/eu_vat_numbers.htm
     * @see http://en.wikipedia.org/wiki/VAT_identification_number
     *
     * @param bool $spacedNationalPrefix
     *
     * @return string VAT Number
     */
    public function vat($spacedNationalPrefix = true)
    {
        $siren = Company::siren(false);
        $key = (12 + 3 * ($siren % 97)) % 97;
        $pattern = "%s%'.02d%s";

        if ($spacedNationalPrefix) {
            $siren = trim(chunk_split($siren, 3, ' '));
            $pattern = "%s %'.02d %s";
        }

        return sprintf($pattern, 'FR', $key, $siren);
    }

    /**
     * International Bank Account Number (IBAN) for France
     *
     * French IBAN structure: FR + 2 check digits + 23 character BBAN
     * BBAN structure: 5 digit bank code + 5 digit branch code (guichet) + 11 alphanumeric account + 2 digit clé RIB
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     * @see https://fr.wikipedia.org/wiki/Cl%C3%A9_RIB
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always FR)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 23)
     *
     * @return string
     */
    public static function iban($countryCode = null, $prefix = '', $length = null)
    {
        // Bank code (5 digits)
        if ($prefix !== '' && strlen($prefix) >= 5) {
            $bankCode = substr($prefix, 0, 5);
            $prefix = substr($prefix, 5);
        } else {
            $bankCode = static::numerify('#####');
        }

        // Branch code / guichet (5 digits)
        if ($prefix !== '' && strlen($prefix) >= 5) {
            $branchCode = substr($prefix, 0, 5);
            $prefix = substr($prefix, 5);
        } else {
            $branchCode = static::numerify('#####');
        }

        // Account number (11 alphanumeric characters)
        if ($prefix !== '') {
            $accountNumber = str_pad(strtoupper(substr($prefix, 0, 11)), 11, '0', STR_PAD_LEFT);
        } else {
            $accountNumber = strtoupper(static::bothify('###########'));
        }

        // Calculate clé RIB (last 2 digits of BBAN)
        $cleRib = static::calculateCleRib($bankCode, $branchCode, $accountNumber);

        // Assemble BBAN
        $bban = $bankCode . $branchCode . $accountNumber . $cleRib;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('FR00' . $bban);

        return 'FR' . $checksum . $bban;
    }

    /**
     * Calculate clé RIB (French BBAN check digits)
     *
     * @param string $bankCode      5 digit bank code
     * @param string $branchCode    5 digit branch code
     * @param string $accountNumber 11 character account number
     *
     * @return string 2 digit clé RIB
     */
    protected static function calculateCleRib(string $bankCode, string $branchCode, string $accountNumber): string
    {
        // Convert letters in account number to numbers
        $numericAccount = strtr(strtoupper($accountNumber), self::$ribLetterMap);

        // Concatenate all parts as a number
        $fullNumber = $bankCode . $branchCode . $numericAccount;

        // Calculate: 97 - (number mod 97)
        $cle = 97 - Iban::mod97($fullNumber . '00');

        // Special case: if remainder is 0, clé RIB is 97
        if ($cle === 0) {
            $cle = 97;
        }

        return str_pad((string) $cle, 2, '0', STR_PAD_LEFT);
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'FR', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
