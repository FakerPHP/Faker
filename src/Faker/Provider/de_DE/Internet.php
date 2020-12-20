<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\de_DE;

class Internet extends \Faker\Provider\Internet
{
    /**
     * @link https://www.statista.com/statistics/446418/most-popular-e-mail-providers-germany/
     * @link http://blog.shuttlecloud.com/the-10-most-popular-email-providers-in-germany
     */
    protected static $freeEmailDomain = [
        'web.de',
        'gmail.com',
        'hotmail.de',
        'yahoo.de',
        'googlemail.com',
        'aol.de',
        'gmx.de',
        'freenet.de',
        'posteo.de',
        'mail.de',
        'live.de',
        't-online.de'
    ];
    protected static $tld = ['com', 'com', 'com', 'net', 'org', 'de', 'de', 'de'];
}
