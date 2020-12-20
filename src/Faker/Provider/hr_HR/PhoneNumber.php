<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\hr_HR;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+385 91 ### ####',
        '+385 92 ### ####',
        '+385 95 ### ####',
        '+385 98 ### ####',
        '+385 99 ### ####',
    ];
}
