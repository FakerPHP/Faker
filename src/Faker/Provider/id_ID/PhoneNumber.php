<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\id_ID;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        // regional numbers
        '02# #### ###',
        '02## #### ###',
        '03## #### ###',
        '04## #### ###',
        '05## #### ###',
        '06## #### ###',
        '07## #### ###',
        '09## #### ###',

        '02# #### ####',
        '02## #### ####',
        '03## #### ####',
        '04## #### ####',
        '05## #### ####',
        '06## #### ####',
        '07## #### ####',
        '09## #### ####',

        // mobile numbers
        '08## ### ###',   // 0811 XXX XXX, 10 digits, very old
        '08## #### ###',  // 0811 XXXX XXX, 11 digits
        '08## #### ####', // 0811 XXXX XXXX, 12 digits

        // international numbers
        '(+62) 8## ### ###',

        '(+62) 2# #### ###',
        '(+62) 2## #### ###',
        '(+62) 3## #### ###',
        '(+62) 4## #### ###',
        '(+62) 5## #### ###',
        '(+62) 6## #### ###',
        '(+62) 7## #### ###',
        '(+62) 8## #### ###',
        '(+62) 9## #### ###',

        '(+62) 2# #### ####',
        '(+62) 2## #### ####',
        '(+62) 3## #### ####',
        '(+62) 4## #### ####',
        '(+62) 5## #### ####',
        '(+62) 6## #### ####',
        '(+62) 7## #### ####',
        '(+62) 8## #### ####',
        '(+62) 9## #### ####',
    ];
}
