<?php

namespace Faker\Provider\ar_DZ;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    /**
     * @var array<int, string>
     */
    protected static $areaCodeRegexes = [
        '(5[4-9][0-9])',
        '(6[4-9][0-9])',
        '(7[4-9][0-9])',
        '([2-4][1-9])',
    ];

    /**
     * @var array Phonenumber formats.
     */
    protected static $formats = [
        '0{{areaCode}}######',
        '0{{areaCode}} ## ## ##',
        '0{{areaCode}}-##-##-##',

        '00213{{areaCode}}######',
        '00213 {{areaCode}} ## ## ##',
        '00213-{{areaCode}}-##-##-##',

        '+213{{areaCode}}######',
        '+213 {{areaCode}} ## ## ##',
        '+213-{{areaCode}}-##-##-##',
    ];

    /**
     * Algeria phone number area code
     *
     * @see https://en.wikipedia.org/wiki/Telephone_numbers_in_Algeria
     *
     * @return string
     */
    public static function areaCode()
    {
        $firstDigit = self::numberBetween(0, count(self::$areaCodeRegexes));

        return self::regexify(self::$areaCodeRegexes[$firstDigit]);
    }
}
