<?php

namespace Faker\Provider\it_IT;

use Faker\Calculator\Iban;

class Payment extends \Faker\Provider\Payment
{
    /**
     * Odd position values for CIN calculation
     *
     * @see https://it.wikipedia.org/wiki/Coordinate_bancarie_italiane
     *
     * @var array<string, int>
     */
    private static $cinOddValues = [
        '0' => 1, '1' => 0, '2' => 5, '3' => 7, '4' => 9, '5' => 13, '6' => 15,
        '7' => 17, '8' => 19, '9' => 21,
        'A' => 1, 'B' => 0, 'C' => 5, 'D' => 7, 'E' => 9, 'F' => 13, 'G' => 15,
        'H' => 17, 'I' => 19, 'J' => 21, 'K' => 2, 'L' => 4, 'M' => 18, 'N' => 20,
        'O' => 11, 'P' => 3, 'Q' => 6, 'R' => 8, 'S' => 12, 'T' => 14, 'U' => 16,
        'V' => 10, 'W' => 22, 'X' => 25, 'Y' => 24, 'Z' => 23,
    ];

    /**
     * International Bank Account Number (IBAN) for Italy
     *
     * Italian IBAN structure: IT + 2 check digits + 23 character BBAN
     * BBAN structure: 1 CIN letter + 5 digit ABI + 5 digit CAB + 12 char account
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_Account_Number
     * @see https://it.wikipedia.org/wiki/Coordinate_bancarie_italiane
     *
     * @param string $countryCode ISO 3166-1 alpha-2 country code (ignored, always IT)
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

        // Calculate CIN
        $cin = static::calculateCin($abi . $cab . $account);

        // Assemble BBAN
        $bban = $cin . $abi . $cab . $account;

        // Calculate IBAN check digits
        $checksum = Iban::checksum('IT00' . $bban);

        return 'IT' . $checksum . $bban;
    }

    /**
     * Calculate Italian CIN (Controllo Interno)
     *
     * @see https://it.wikipedia.org/wiki/Coordinate_bancarie_italiane
     *
     * @param string $code 22 character string (ABI + CAB + Account)
     *
     * @return string Single CIN letter (A-Z)
     */
    protected static function calculateCin(string $code): string
    {
        $code = strtoupper($code);
        $sum = 0;

        for ($i = 0; $i < 22; ++$i) {
            $char = $code[$i];
            // Position is 1-indexed for odd/even determination
            $position = $i + 1;

            if ($position % 2 === 1) {
                // Odd position - use special values
                $sum += self::$cinOddValues[$char];
            } else {
                // Even position - letters A=0, B=1..., digits as their value
                if (ctype_digit($char)) {
                    $sum += (int) $char;
                } else {
                    $sum += ord($char) - ord('A');
                }
            }
        }

        // CIN is the result mod 26 converted to a letter
        return chr(ord('A') + ($sum % 26));
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
    public static function bankAccountNumber($prefix = '', $countryCode = 'IT', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
