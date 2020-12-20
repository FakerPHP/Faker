<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\de_AT;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['aon.at', 'chello.at', 'gmail.com', 'gmx.at', 'univie.ac.at'];
    protected static $tld = ['at', 'co.at', 'com', 'net', 'org'];
}
