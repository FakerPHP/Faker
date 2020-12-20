<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\el_CY;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'cablenet.com.cy', 'cytanet.com.cy', 'primehome.com'];
    protected static $tld = ['com.cy', 'com.cy', 'com.cy', 'com.cy', 'com.cy', 'com.cy', 'biz', 'info', 'net', 'org'];
}
