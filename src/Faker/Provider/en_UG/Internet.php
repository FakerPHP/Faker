<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\en_UG;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'gmail.co.ug', 'yahoo.co.ug', 'hotmail.co.ug'];
    protected static $tld = ['com', 'com', 'com', 'com', 'com', 'com', 'biz', 'info', 'net', 'org', 'co.ug', 'ug'];
}
