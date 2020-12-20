<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\kk_KZ;

class Color extends \Faker\Provider\Color
{
    protected static $safeColorNames = [
        'қара', 'қою қызыл', 'жасыл', 'қара көк', 'сарғыш түс',
        'күлгін', 'көк', 'көк', 'күміс',
        'сұр', 'сары', 'қызылкүрең түс', 'теңіз толқыны түс', 'ақ'
    ];
}
