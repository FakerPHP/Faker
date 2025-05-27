<?php

namespace Faker\Provider\sq_AL;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '{{mobileNumber}}',
        '{{fixedLineNumber}}',
    ];

    protected static $e164Formats = [
        '+355{{mobileNumber}}',
        '+355{{fixedLineNumber}}',
    ];

    /**
     * https://en.wikipedia.org/wiki/Telephone_numbers_in_Albania#Mobile_phone_codes
     * https://github.com/giggsey/libphonenumber-for-php/blob/master/src/data/PhoneNumberMetadata_AL.php
     */
    protected static $mobileFormats = [
        '06[78][2-9]\d{6}',
        '069\d{7}'
    ];

    /**
     * https://en.wikipedia.org/wiki/Telephone_numbers_in_Albania#Numbering_plan_by_Municipality_(effective_15_September_2008)
     * https://github.com/giggsey/libphonenumber-for-php/blob/master/src/data/PhoneNumberMetadata_AL.php
     */
    protected static $fixedLineFormats = [
        '04505[0-2]\d{3}',
        '0[2358][16-9]\d[2-9]\d{4}',
        '04410\d{4}',
        '0[2358][2-5][2-9]\d{5}',
        '04[2-57-9][2-9]\d{5}',
        '046\d{6}',
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

        return preg_replace('/\+3550(\d+)/', '+355$1', $phoneNumber);
    }
}
