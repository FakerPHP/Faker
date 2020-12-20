<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\hy_AM;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'yandex.ru', 'mail.ru', 'mail.am'];
    protected static $tld = ['com', 'com', 'am', 'am', 'am', 'net', 'org', 'ru', 'am', 'am', 'am'];
}
