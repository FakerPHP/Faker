<?php

namespace Faker\Provider\nl_BE;

use Faker\Calculator\Iban;

class Payment extends \Faker\Provider\Payment
{
    /**
     * International Bank Account Number (IBAN) for Belgium
     *
     * Belgian IBAN structure: BE + 2 check digits + 12 digit BBAN
     * BBAN structure: 3 digit bank code + 7 digit account number + 2 check digits
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     * @see https://www.nbb.be/en/payment-systems/payment-standards/bank-account-numbers
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always BE)
     * @param string $prefix      for generating bank account number of a specific bank
     * @param int    $length      total length without country code and 2 check digits (ignored, always 12)
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

        // Account number (7 digits)
        if ($prefix !== '') {
            $accountNumber = str_pad(substr($prefix, 0, 7), 7, '0', STR_PAD_LEFT);
        } else {
            $accountNumber = static::numerify('#######');
        }

        // Calculate check digits (MOD 97 of bank code + account number)
        $checkDigits = static::calculateBelgianCheckDigits($bankCode . $accountNumber);

        // Assemble BBAN
        $bban = $bankCode . $accountNumber . $checkDigits;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('BE00' . $bban);

        return 'BE' . $checksum . $bban;
    }

    /**
     * Calculate Belgian BBAN check digits
     *
     * Belgian check digits = (bank code + account number) MOD 97
     * If the result is 0, use 97 instead.
     *
     * @param string $number 10 digit string (bank code + account number)
     *
     * @return string 2 digit check digits
     */
    protected static function calculateBelgianCheckDigits(string $number): string
    {
        $check = (int) bcmod($number, '97');

        // If result is 0, use 97
        if ($check === 0) {
            $check = 97;
        }

        return str_pad((string) $check, 2, '0', STR_PAD_LEFT);
    }

    /**
     * International Bank Account Number (IBAN).
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     *
     * @param string $prefix      for generating bank account number of a specific bank
     * @param string $countryCode ISO 3166-1 alpha-2 country code
     * @param int    $length      total length without country code and 2 check digits
     *
     * @return string
     */
    public static function bankAccountNumber($prefix = '', $countryCode = 'BE', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }

    /**
     * Value Added Tax (VAT).
     *
     * @example 'BE0123456789', ('spaced') 'BE 0123456789'
     *
     * @see http://ec.europa.eu/taxation_customs/vies/faq.html?locale=en#item_11
     * @see http://www.iecomputersystems.com/ordering/eu_vat_numbers.htm
     * @see http://en.wikipedia.org/wiki/VAT_identification_number
     *
     * @param bool $spacedNationalPrefix
     *
     * @return string VAT Number
     */
    public static function vat($spacedNationalPrefix = true)
    {
        $prefix = $spacedNationalPrefix ? 'BE ' : 'BE';

        // Generate 7 numbers of vat.
        $firstSeven = self::randomNumber(7, true);

        // Generate checksum for number
        $checksum = 97 - fmod($firstSeven, 97);

        // '0' + 7 numbers + checksum
        return sprintf('%s0%s%02d', $prefix, $firstSeven, $checksum);
    }
}
