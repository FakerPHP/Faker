<?php

namespace Faker\Provider\mk_MK;

use Faker\Calculator\Iban;

/**
 * North Macedonia Payment Provider
 *
 * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number
 */
class Payment extends \Faker\Provider\Payment
{
    /**
     * International Bank Account Number (IBAN) for North Macedonia
     *
     * North Macedonia IBAN structure: MK + 2 check digits + 15 digit BBAN
     * BBAN structure: 3 digit bank code + 10 alphanumeric account characters + 2 digit national check digits
     *
     * National check digits use ISO 7064 MOD 97-10.
     * Letters in account number are converted to numbers (A=10, B=11, ... Z=35) for calculation.
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always MK)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 15)
     *
     * @return string
     */
    public static function iban($countryCode = null, $prefix = '', $length = null)
    {
        // Bank code (3 digits)
        if ($prefix !== '' && strlen($prefix) >= 3) {
            $bankCode = substr($prefix, 0, 3);
            $prefix = substr($prefix, 3);
        } else {
            $bankCode = static::numerify('###');
        }

        // Account number (10 alphanumeric characters)
        if ($prefix !== '') {
            $accountNumber = strtoupper(str_pad(substr($prefix, 0, 10), 10, '0', STR_PAD_LEFT));
        } else {
            $accountNumber = strtoupper(static::bothify('##########'));
        }

        // Calculate national check digits using MOD 97-10
        // Convert letters to numbers for calculation
        $numericAccount = Iban::alphanumericToNumeric($accountNumber);
        $checkDigits = Iban::mod97_10($bankCode . $numericAccount);

        // Assemble BBAN
        $bban = $bankCode . $accountNumber . $checkDigits;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('MK00' . $bban);

        return 'MK' . $checksum . $bban;
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'MK', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
