<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\ro_MD;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        'a## # ## ##',
        '(022) ### ###',
        '+373 60 ### ###',
        '+373 65 0## ###',
        '+373 67 ### ###',
        '+373 68 ### ###',
        '+373 69 ### ###',
        '+373 78 ### ###',
        '+373 79 ### ###',
        '+373 77 4## ###',
        '+373 77 7## ###',
        '+373 77 8## ###',
        '+373 77 9## ###',
        '(373) 60 ### ###',
        '(373) 65 0## ###',
        '(373) 67 ### ###',
        '(373) 68 ### ###',
        '(373) 69 ### ###',
        '(373) 78 ### ###',
        '(373) 79 ### ###',
        '(373) 77 4## ###',
        '(373) 77 7## ###',
        '(373) 77 8## ###',
        '(373) 77 9## ###',
    ];
}
