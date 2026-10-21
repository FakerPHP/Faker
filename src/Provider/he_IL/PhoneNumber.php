<?php

namespace Faker\Provider\he_IL;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $mobileFormat = '05#-#######';
    protected static $landlineFormat = '0#-#######';
    protected static $internationalMobileFormat = '972-5#-#######';
    protected static $internationalLandlineFormat = '972-#-########';
    protected static $clearMobileFormat = '05########';

    public static function phoneNumber()
    {
        return static::numerify(static::randomElement([
            static::$mobileFormat,
            static::$landlineFormat,
            static::$internationalMobileFormat,
            static::$internationalLandlineFormat,
            static::$clearMobileFormat,
        ]));
    }

    public static function mobileNumber()
    {
        return static::numerify(static::$mobileFormat);
    }

    public static function cellularNumber()
    {
        return static::mobileNumber();
    }

    public static function mobilePhoneNumber()
    {
        return static::mobileNumber();
    }

    public static function landlineNumber()
    {
        return static::numerify(static::$landlineFormat);
    }

    public static function internationalMobileNumber()
    {
        return static::numerify(static::$internationalMobileFormat);
    }

    public static function internationalCelnumber()
    {
        return static::internationalMobileNumber();
    }

    public static function internationalLandline()
    {
        return static::numerify(static::$internationalLandlineFormat);
    }

    public static function clearMobileNumber()
    {
        return static::numerify(static::$clearMobileFormat);

    }

    public static function clearMobilePhoneNumber()
    {
        return static::clearMobileNumber();
    }

    public static function clearCellularPhoneNumber()
    {
        return static::clearMobileNumber();
    }
}
