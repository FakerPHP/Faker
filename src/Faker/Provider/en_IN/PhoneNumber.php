<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\en_IN;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+91 ## ########',
        '+91 ### #######',
        '0## ########',
        '0### #######'
    ];

    /**
     * An array of en_IN mobile (cell) phone number formats
     * @var array
     */
    protected static $mobileFormats = [
        '+91 9#########',
        '+91 8#########',
        '+91 7#########',
        '09#########',
        '08#########',
        '07#########'
    ];

    /**
     * Return a en_IN mobile phone number
     * @return string
     */
    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileFormats));
    }
}
