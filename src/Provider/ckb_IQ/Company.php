<?php

namespace Faker\Provider\ckb_IQ;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{companyPrefix}} {{companyField}} {{firstNameMale}}',
        '{{companyPrefix}} {{companyField}} {{firstNameMale}}',
        '{{companyPrefix}} {{companyField}} {{lastName}}',
        '{{companyField}} {{lastName}}',
        '{{lastName}} {{companySuffix}}',
    ];

    protected static $companyPrefix = [
        'کۆمپانیای', 'دامەزراوەی', 'کۆمەڵەی', 'بنکەی',
    ];

    protected static $companyField = [
        'بازرگانی', 'دارایی', 'کارگێڕی', 'تەکنەلۆجیای زانیاری',
        'بیناسازی', 'گەشتیاری', 'پیشەسازی', 'کشتوکاڵ',
    ];

    protected static $companySuffix = [
        'گروپ', 'هۆڵدینگ',
    ];

    protected static $contract = [
        'فوڵتایم', 'پارتتایم', 'گرێبەستی', 'کاتژمێری', 'پڕۆژەیی',
    ];

    /**
     * @example 'کۆمپانیای'
     *
     * @return string
     */
    public static function companyPrefix()
    {
        return static::randomElement(static::$companyPrefix);
    }

    /**
     * @example 'بازرگانی'
     *
     * @return string
     */
    public static function companyField()
    {
        return static::randomElement(static::$companyField);
    }

    /**
     * @example 'فوڵتایم'
     *
     * @return string
     */
    public function contract()
    {
        return static::randomElement(static::$contract);
    }
}
