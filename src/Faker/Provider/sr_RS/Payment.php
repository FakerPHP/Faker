<?php

namespace Faker\Provider\sr_RS;

use Faker\Calculator\Iban;

/**
 * Serbia Payment Provider
 *
 * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number
 */
class Payment extends \Faker\Provider\Payment
{
    /**
     * Serbian bank codes that use MOD 97-10 check digits
     *
     * Note: Bank 908 (Narodna banka Srbije / National Bank of Serbia) uses a different scheme.
     *
     * @var string[]
     */
    protected static $bankCodes = [
        '105', '115', '125', '145', '150', '155', '160', '165', '170', '175',
        '180', '190', '200', '205', '220', '240', '250', '260', '265', '270',
        '275', '280', '285', '290', '295', '310', '325', '330', '340', '360',
        '370', '375', '380', '385', '390', '395', '405', '415', '440', '445',
        '485', '500', '505', '540', '555', '575',
    ];

    /**
     * International Bank Account Number (IBAN) for Serbia
     *
     * Serbian IBAN structure: RS + 2 check digits + 18 digit BBAN
     * BBAN structure: 3 digit bank code + 13 digit account number + 2 digit national check digits
     *
     * National check digits use ISO 7064 MOD 97-10.
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always RS)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 18)
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
            $bankCode = static::randomElement(static::$bankCodes);
        }

        // Account number (13 digits)
        if ($prefix !== '') {
            $accountNumber = str_pad(substr($prefix, 0, 13), 13, '0', STR_PAD_LEFT);
        } else {
            $accountNumber = static::numerify('#############');
        }

        // Assemble BBAN with check digits
        $bban = $bankCode . $accountNumber . Iban::mod97_10($bankCode . $accountNumber);

        // Calculate IBAN check digits
        $checksum = Iban::checksum('RS00' . $bban);

        return 'RS' . $checksum . $bban;
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'RS', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
