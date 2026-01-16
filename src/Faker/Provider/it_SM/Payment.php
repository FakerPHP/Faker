<?php

namespace Faker\Provider\it_SM;

use Faker\Calculator\Iban;

/**
 * San Marino Payment Provider
 *
 * San Marino IBANs use the Italian BBAN format (CIN) with SM country code.
 *
 * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number
 */
class Payment extends \Faker\Provider\it_IT\Payment
{
    /**
     * International Bank Account Number (IBAN) for San Marino
     *
     * San Marino IBAN structure: SM + 2 check digits + 23 character BBAN
     * BBAN structure: 1 CIN letter + 5 digit ABI + 5 digit CAB + 12 char account
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always SM)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 23)
     *
     * @return string
     */
    public static function iban($countryCode = null, $prefix = '', $length = null)
    {
        // ABI - bank code (5 digits)
        if ($prefix !== '' && strlen($prefix) >= 5) {
            $abi = substr($prefix, 0, 5);
            $prefix = substr($prefix, 5);
        } else {
            $abi = static::numerify('#####');
        }

        // CAB - branch code (5 digits)
        if ($prefix !== '' && strlen($prefix) >= 5) {
            $cab = substr($prefix, 0, 5);
            $prefix = substr($prefix, 5);
        } else {
            $cab = static::numerify('#####');
        }

        // Account number (12 alphanumeric characters)
        if ($prefix !== '') {
            $account = strtoupper(str_pad(substr($prefix, 0, 12), 12, '0', STR_PAD_LEFT));
        } else {
            $account = strtoupper(static::bothify('############'));
        }

        // Calculate CIN (inherited from it_IT)
        $cin = static::calculateCin($abi . $cab . $account);

        // Assemble BBAN
        $bban = $cin . $abi . $cab . $account;

        // Calculate IBAN check digits for San Marino
        $checksum = Iban::checksum('SM00' . $bban);

        return 'SM' . $checksum . $bban;
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'SM', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
