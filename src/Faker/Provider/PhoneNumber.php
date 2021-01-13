<?php

namespace Faker\Provider;

use Faker\Calculator\Luhn;

class PhoneNumber extends Base
{
    protected static $formats = ['###-###-###'];

    /** @link https://github.com/giggsey/libphonenumber-for-php/blob/master/src/CountryCodeToRegionCodeMapForTesting.php */
    protected static $e164Formats = [
        '+1##########',
        '+7##########',
        '+33##########',
        '+39##########',
        '+44##########',
        '+46##########',
        '+48##########',
        '+49##########',
        '+52##########',
        '+54##########',
        '+55##########',
        '+61##########',
        '+64##########',
        '+65##########',
        '+81##########',
        '+82##########',
        '+86##########',
        '+244##########',
        '+262##########',
        '+290##########',
        '+374##########',
        '+375##########',
        '+376##########',
        '+800##########',
        '+882##########',
        '+971##########',
        '+979##########',
        '+998##########',
    ];

    /**
     * @example '555-123-546'
     */
    public function phoneNumber()
    {
        return static::numerify($this->generator->parse(static::randomElement(static::$formats)));
    }

    /**
     * @example +11134567890
     *
     * @return string
     */
    public function e164PhoneNumber()
    {
        return static::numerify($this->generator->parse(static::randomElement(static::$e164Formats)));
    }

    /**
     * International Mobile Equipment Identity (IMEI)
     *
     * @see http://en.wikipedia.org/wiki/International_Mobile_Station_Equipment_Identity
     * @see http://imei-number.com/imei-validation-check/
     *
     * @example '720084494799532'
     *
     * @return int $imei
     */
    public function imei()
    {
        $imei = (string) static::numerify('##############');
        $imei .= Luhn::computeCheckDigit($imei);

        return $imei;
    }
}
