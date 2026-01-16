<?php

namespace Faker\Provider\fr_MC;

use Faker\Calculator\Iban;

/**
 * Monaco Payment Provider
 *
 * Monaco IBANs use the French BBAN format (clé RIB) with MC country code.
 *
 * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number
 */
class Payment extends \Faker\Provider\fr_FR\Payment
{
    /**
     * International Bank Account Number (IBAN) for Monaco
     *
     * Monaco IBAN structure: MC + 2 check digits + 23 character BBAN
     * BBAN structure: 5 digit bank code + 5 digit branch code (guichet) + 11 alphanumeric account + 2 digit clé RIB
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always MC)
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

        // Calculate clé RIB (inherited from fr_FR)
        $cleRib = static::calculateCleRib($bankCode, $branchCode, $accountNumber);

        // Assemble BBAN
        $bban = $bankCode . $branchCode . $accountNumber . $cleRib;

        // Calculate IBAN check digits for Monaco
        $checksum = Iban::checksum('MC00' . $bban);

        return 'MC' . $checksum . $bban;
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'MC', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
