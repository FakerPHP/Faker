<?php

namespace Faker\Provider\en_IE;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+353 1 ### ####',
        '+353 21 ### ####',
        '+353 61 ### ####',
        '+353 91 ### ####',
        '+353 51 ### ####',
        '+353 56 ### ####',
        '+353 41 ### ####',
        '+353 71 ### ####',
        '+353 74 ### ####',
        '+353 66 ### ####',
        '+353 64 ### ####',
        '+353 ## ### ####',
        '01 ### ####',
        '021 ### ####',
        '061 ### ####',
        '091 ### ####',
        '0## ### ####',
    ];

    protected static $mobileFormats = [
        '083 ### ####',
        '085 ### ####',
        '086 ### ####',
        '087 ### ####',
        '089 ### ####',
    ];

    protected static $e164Formats = [
        '+353#########',
    ];

    /**
     * Return an Irish mobile phone number.
     *
     * @return string
     */
    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileFormats));
    }
}
