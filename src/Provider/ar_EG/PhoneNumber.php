<?php

namespace Faker\Provider\ar_EG;

class PhoneNumber extends \Faker\Provider\PhoneNumber
# References:
# https://en.wikipedia.org/wiki/Telephone_numbers_in_Egypt
# https://krispcall.com/blog/egypt-phone-number-format/
{

    protected static $formats = [
        '0{{areaCode}}#######',
        '+20{{areaCode}}#######',
        '0{{areaCode}} ### ####',
        '+20 {{areaCode}} ### ####',
    ];


    protected static $mobileFormats = [
        '010########',
        '011########',
        '012########',
        '015########',
        '+2010########',
        '+2011########',
        '+2012########',
        '+2015########',
        '010 #### ####',
        '011 #### ####',
        '012 #### ####',
        '015 #### ####',
        '+20 10 #### ####',
        '+20 11 #### ####',
        '+20 12 #### ####',
        '+20 15 #### ####',
    ];

    protected static $areaCodes = [
        '2',
        '3',
        '13',
        '15',
        '40',
        '45',
        '47',
        '48',
        '50',
        '55',
        '57',
        '62',
        '64',
        '65',
        '66',
        '68',
        '69',
        '82',
        '84',
        '86',
        '88',
        '92',
        '93',
        '95',
        '97',
    ];

    public static function areaCode()
    {
        return static::numerify(static::randomElement(static::$areaCodes));
    }
    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileFormats));
    }
}
