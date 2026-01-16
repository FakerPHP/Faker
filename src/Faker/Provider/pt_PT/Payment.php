<?php

namespace Faker\Provider\pt_PT;

use Faker\Calculator\Iban;

class Payment extends \Faker\Provider\Payment
{
    /**
     * Valid Portuguese bank codes (assigned by Banco de Portugal)
     *
     * @see https://www.bportugal.pt/
     *
     * @var string[]
     */
    protected static $bankCodes = [
        '0001', '0007', '0008', '0010', '0014', '0018', '0019', '0022', '0023', '0025',
        '0027', '0033', '0035', '0036', '0045', '0046', '0047', '0048', '0059', '0061',
        '0063', '0064', '0065', '0073', '0076', '0079', '0086', '0097', '0098', '0099',
        '0160', '0170', '0186', '0189', '0193', '0235', '0244', '0269', '0698', '0781',
        '5180', '5200', '5340', '8050',
    ];

    /**
     * International Bank Account Number (IBAN) for Portugal
     *
     * Portuguese IBAN structure: PT + 2 check digits + 21 digit BBAN
     * BBAN structure: 4 digit bank code + 4 digit branch code + 11 digit account number + 2 digit NIB check digits
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always PT)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 21)
     *
     * @return string
     */
    public static function iban($countryCode = null, $prefix = '', $length = null)
    {
        // Bank code (4 digits) - use prefix if provided and valid, otherwise random
        if ($prefix !== '' && strlen($prefix) >= 4) {
            $bankCode = substr($prefix, 0, 4);
            $prefix = substr($prefix, 4);
        } else {
            $bankCode = static::randomElement(static::$bankCodes);
        }

        // Branch code (4 digits)
        if ($prefix !== '' && strlen($prefix) >= 4) {
            $branchCode = substr($prefix, 0, 4);
            $prefix = substr($prefix, 4);
        } else {
            $branchCode = static::numerify('####');
        }

        // Account number (11 digits)
        if ($prefix !== '') {
            $accountNumber = str_pad(substr($prefix, 0, 11), 11, '0', STR_PAD_LEFT);
        } else {
            $accountNumber = static::numerify('###########');
        }

        // Calculate NIB check digits (last 2 digits of BBAN)
        $nibCheckDigits = static::calculateNibCheckDigits($bankCode . $branchCode . $accountNumber);

        // Assemble BBAN
        $bban = $bankCode . $branchCode . $accountNumber . $nibCheckDigits;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('PT00' . $bban);

        return 'PT' . $checksum . $bban;
    }

    /**
     * Calculate NIB check digits using ISO 7064 MOD 97-10
     *
     * The formula (98 - r) % 97 produces check digits in range 00-96,
     * mapping the edge cases: 98→01, 97→00. These are equivalent under
     * mod 97 verification since (N + 98) ≡ (N + 01) ≡ 1 (mod 97).
     *
     * @see https://en.wikipedia.org/wiki/International_Bank_Account_Number#Algorithms
     *
     * @param string $nibWithoutCheck 19 digit string (bank code + branch code + account number)
     *
     * @return string 2 digit check digits
     */
    protected static function calculateNibCheckDigits(string $nibWithoutCheck): string
    {
        $check = (98 - Iban::mod97($nibWithoutCheck . '00')) % 97;

        return str_pad((string) $check, 2, '0', STR_PAD_LEFT);
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'PT', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
