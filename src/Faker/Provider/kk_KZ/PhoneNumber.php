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

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+7 (701) #######',
        '+7 (702) #######',
        '+7 (705) #######',
        '+7 (707) #######',
        '+7 (727) 239####',
        '+7 (747) #######',
        '+7 (7172) 745###',
    ];
}
