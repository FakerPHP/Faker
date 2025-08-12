<?php

namespace Faker\Provider\in_BD;

class Company extends \Faker\Provider\Company
{
    protected static $companyPrefixes = [
        'Tech', 'Soft', 'Info', 'Data', 'Green', 'Sky', 'Smart', 'Global', 'Next', 'Prime'
    ];

    protected static $companySuffixes = [
        'Ltd', 'Limited', 'Corporation', 'Group', 'Inc'
    ];

    public function company()
    {
        return static::randomElement(static::$companyPrefixes) . ' ' . static::randomElement(static::$companySuffixes);
    }
}
