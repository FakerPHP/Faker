<?php

namespace Faker\Provider\sq_XK;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '{{mobileNumber}}',
        '{{fixedLineNumber}}',
    ];

    protected static $e164Formats = [
        '+383{{mobileNumber}}',
        '+383{{fixedLineNumber}}',
    ];

    /**
     * https://en.wikipedia.org/wiki/Telephone_numbers_in_Kosovo#Mobile_telephony
     * https://github.com/giggsey/libphonenumber-for-php/blob/master/src/data/PhoneNumberMetadata_XK.php
     */
    protected static $mobileFormats = [
        '04[3-9]\d{6}',
    ];

    /**
     * https://en.wikipedia.org/wiki/Telephone_numbers_in_Kosovo#Fixed-line_telephony
     * https://github.com/giggsey/libphonenumber-for-php/blob/master/src/data/PhoneNumberMetadata_XK.php
     */
    protected static $fixedLineFormats = [
        '038\d{6}',
        '038\d{7}',
        '038\d{8}',
        '038\d{9}',
        '038\d{10}',
        '0280\d{5}',
        '0280\d{6}',
        '028[1-9]\d{5}',
        '0290\d{5}',
        '0290\d{6}',
        '029[1-9]\d{5}',
        '0390\d{5}',
        '0390\d{6}',
        '039[1-9]\d{5}',
    ];

    public function mobileNumber(): string
    {
        $format = static::randomElement(static::$mobileFormats);

        return static::regexify($format);
    }

    public function fixedLineNumber(): string
    {
        $format = static::randomElement(static::$fixedLineFormats);

        return static::regexify($format);
    }

    public function e164PhoneNumber(): string
    {
        $format = static::randomElement(static::$e164Formats);

        $phoneNumber = $this->generator->parse($format);

        return preg_replace('/\+3830(\d+)/', '+383$1', $phoneNumber);
    }
}
