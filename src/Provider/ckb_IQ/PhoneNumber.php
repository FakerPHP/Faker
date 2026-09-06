<?php

namespace Faker\Provider\ckb_IQ;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    /**
     * @see https://en.wikipedia.org/wiki/Telephone_numbers_in_Iraq
     */
    protected static $formats = [
        '066######', // Hewlêr (Erbil)
        '053######', // Silêmanî (Sulaymaniyah)
        '062######', // Duhok
        '050######', // Kerkûk (Kirkuk)
    ];

    /**
     * @see https://en.wikipedia.org/wiki/Telephone_numbers_in_Iraq
     */
    protected static $mobileNumberPrefixes = [
        '0750#######', // Korek Telecom
        '0751#######', // Korek Telecom
        '0770#######', // Asiacell
        '0771#######', // Asiacell
        '0772#######', // Asiacell
        '0773#######', // Asiacell
        '0780#######', // Zain
        '0781#######', // Zain
        '0790#######', // Zain
    ];

    /**
     * @example '0750xxxxxxx'
     *
     * @return string
     */
    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileNumberPrefixes));
    }
}
