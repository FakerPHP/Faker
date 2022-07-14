<?php

namespace Faker\Provider\ar_EG;

class Internet extends \Faker\Provider\Internet
{
    protected static $userNameFormats = [
        '{{lastNameAscii}}.{{firstNameAscii}}',
        '{{firstNameAscii}}.{{lastNameAscii}}',
        '{{firstNameAscii}}##',
        '?{{lastNameAscii}}',
    ];
    protected static $safeEmailTld = [
        'com', 'com.sy', 'sy', 'me', 'net', 'org', 'gov.sy', 'gov', 'edu.sy',
    ];

    protected static $tld = [
        'com', 'come.sy', 'info', 'sy', 'net', 'org',
    ];

    protected static $lastNameAscii = [
        'ahmed',
        'mostafa',
        'mahmoud',
        'abbas',
        'wizzo',
        'sharif',
        'ali',
        'joundy',
        'saoud',
        'salem',
        'jadid',
        'karim',
        'abdulaziz',
        'mouas',
        'karam',
        'abdulaziz',
        'jaffar',
        'hisham',
        'naji',
        'youssef',
        'rizk',
        'ramzy',
        'younes',
        'johney',
        'shaheen',
        'ibraheem',
        'haidar',
        'barakat',
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
        'mouhammed',
        'saif',
        'basma',
        'youssef',
        'hashem',
        'zainab',
        'hany',
        'hashem',
        'hisham',
        'motaz',
        'ali',
        'haidar',
        'jaffar',
        'mamdouh',
        'hussein',
        'hasan',
        'hamza',
        'omar',
        'khalid',
        'jamil',
        'shahed',
        'batool',
        'khould',
        'anoud',
        'mona',
        'samir',
        'laith',
        'amjad',
        'majdy',
        'majd',
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
     * @example 'mahmoud.johney'
     */
    public function userName()
    {
        $format = static::randomElement(static::$userNameFormats);

        return static::bothify($this->generator->parse($format));
    }

    /**
     * @example 'wewebit.sy'
     */
    public function domainName()
    {
        return static::randomElement(static::$lastNameAscii) . '.' . $this->tld();
    }
}
