<?php

namespace Faker\Provider\sl_SI;

use Faker\Calculator\Iban;

/**
 * Slovenia Payment Provider
 *
 * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number
 */
class Payment extends \Faker\Provider\Payment
{
    /**
     * Slovenian bank codes that use MOD 97-10 check digits
     *
     * Note: Bank 01 (Banka Slovenije / Bank of Slovenia) uses a different scheme.
     *
     * @var string[]
     */
    protected static $bankCodes = [
        '02', '03', '04', '05', '06', '08', '09', '10', '11', '12',
        '13', '14', '15', '17', '18', '19', '20', '22', '23', '24',
        '25', '26', '27', '28', '29', '30', '31', '32', '33', '34',
        '35', '36', '37', '38', '39', '40',
    ];

    /**
     * International Bank Account Number (IBAN) for Slovenia
     *
     * Slovenian IBAN structure: SI + 2 check digits + 15 digit BBAN
     * BBAN structure: 5 digit bank/branch code + 8 digit account number + 2 digit national check digits
     *
     * National check digits use ISO 7064 MOD 97-10.
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always SI)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 15)
     *
     * @return string
     */
    public static function iban($countryCode = null, $prefix = '', $length = null)
    {
        // Bank code (2 digits) + branch code (3 digits) = 5 digits total
        if ($prefix !== '' && strlen($prefix) >= 5) {
            $bankBranch = substr($prefix, 0, 5);
            $prefix = substr($prefix, 5);
        } else {
            $bankCode = static::randomElement(static::$bankCodes);
            $branchCode = static::numerify('###');
            $bankBranch = $bankCode . $branchCode;
        }

        // Account number (8 digits)
        if ($prefix !== '') {
            $accountNumber = str_pad(substr($prefix, 0, 8), 8, '0', STR_PAD_LEFT);
        } else {
            $accountNumber = static::numerify('########');
        }

        // Assemble BBAN with check digits
        $bban = $bankBranch . $accountNumber . Iban::mod97_10($bankBranch . $accountNumber);

        // Calculate IBAN check digits
        $checksum = Iban::checksum('SI00' . $bban);

        return 'SI' . $checksum . $bban;
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'SI', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
