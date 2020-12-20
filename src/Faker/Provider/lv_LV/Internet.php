<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\lv_LV;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['mail.lv', 'apollo.lv', 'inbox.lv', 'gmail.com', 'yahoo.com', 'hotmail.com'];
    protected static $tld = ['com', 'com', 'net', 'org', 'lv', 'lv', 'lv', 'lv'];
}
