<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\en_NZ;

class Internet extends \Faker\Provider\Internet
{
    /**
     * An array of New Zealand TLDs.
     *
     * @link https://en.wikipedia.org/wiki/.nz
     * @var array
     */
    protected static $tld = [
        'com', 'nz', 'ac.nz', 'co.nz', 'geek.nz', 'gen.nz', 'kiwi.nz', 'maori.nz', 'net.nz', 'org.nz', 'school.nz', 'cri.nz', 'govt.nz', 'health.nz', 'iwi.nz', 'mil.nz', 'parliament.nz',
    ];
}
