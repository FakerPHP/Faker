<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\it_IT;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'email.it', 'libero.it', 'yahoo.it'];
    protected static $tld = ['com', 'com', 'com', 'net', 'org', 'it', 'it', 'it'];
}
