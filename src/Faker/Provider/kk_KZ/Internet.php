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

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['mail.kz', 'yandex.kz', 'host.kz'];
    protected static $tld = ['com', 'com', 'net', 'org', 'kz', 'kz', 'kz', 'kz'];
}
