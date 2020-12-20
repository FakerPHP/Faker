<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\ne_NP;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '01-4######',
        '01-5######',
        '01-6######',
        '9841######',
        '9849######',
        '98510#####',
        '9803######',
        '9808######',
        '9813######',
        '9818######',
    ];
}
