<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\nl_NL;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '06 ########',
        '06-########',
        '+316-########',
        '+31(0)6-########',
        '+316 ########',
        '+31(0)6 ########',
        '01# #######',
        '(01#) #######',
        '+311# #######',
        '02# #######',
        '(02#) #######',
        '+312# #######',
        '03# #######',
        '(03#) #######',
        '+313# #######',
        '04# #######',
        '(04#) #######',
        '+314# #######',
        '05# #######',
        '(05#) #######',
        '+315# #######',
        '07# #######',
        '(07#) #######',
        '+317# #######',
        '0800 ######',
        '+31800 ######',
        '088 #######',
        '+3188 #######',
        '0900 ######',
        '+31900 ######',
    ];
}
