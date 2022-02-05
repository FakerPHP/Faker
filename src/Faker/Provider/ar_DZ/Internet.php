<?php

namespace Faker\Provider\ar_DZ;

class Internet extends \Faker\Provider\Internet
{
    protected static $userNameFormats = [
        '{{lastNameAscii}}.{{firstNameAscii}}',
        '{{firstNameAscii}}.{{lastNameAscii}}',
        '{{firstNameAscii}}##',
        '?{{lastNameAscii}}',
    ];
    protected static $safeEmailTld = [
        'com', 'com.dz', 'dz', 'me', 'net', 'org',
    ];

    protected static $tld = [
        'biz', 'com', 'come.dz', 'info', 'dz', 'net', 'org',
    ];

    protected static $lastNameAscii = [
        'ahmed',
        'mostafa',
        'mahmoud',
        'carmen',
        'rakeen',
        'hazem',
        'ezz',
        'hemeida',
        'ramah',
        'fahmy',
        'ehab',
        'karim',
        'abdulaziz',
        'elsherbiny',
        'karam',
        'abdulaziz',
        'bayoumi',
        'tharwat',
        'elshamy',
        'youssef',
        'rizk',
        'ramzy',
        'younes',
        'selim',
    ];
    protected static $firstNameAscii = [
        'ahmed',
        'mostafa',
        'mahmoud',
        'hazem',
        'ehab',
        'karim',
        'dina',
        'maged',
        'mohamed',
        'saif',
        'basma',
        'youssef',
        'hashem',
        'dina',
        'hani',
        'hashem',
    ];

    public static function lastNameAscii()
    {
        return static::randomElement(static::$lastNameAscii);
    }

    public static function firstNameAscii()
    {
        return static::randomElement(static::$firstNameAscii);
    }

    /**
     * @example 'ahmad.abbadi'
     */
    public function userName()
    {
        $format = static::randomElement(static::$userNameFormats);

        return static::bothify($this->generator->parse($format));
    }

    /**
     * @example 'wewebit.jo'
     */
    public function domainName()
    {
        return static::randomElement(static::$lastNameAscii) . '.' . $this->tld();
    }
}
