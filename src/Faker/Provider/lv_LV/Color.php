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

class Color extends \Faker\Provider\Color
{
    protected static $safeColorNames = [

        'balts', 'melns', 'sarkans', 'zaļš', 'dzeltens', 'zils',
        'brūns', 'purpurs', 'rozā', 'oranžs', 'pelēks'

    ];

    protected static $allColorNames = [
        'bēšs', 'palss šatens', 'bordo', 'marengo', 'mēļš', 'sirms', 'ruds', 'rūsgans',
        'ābolains', 'bērs', 'dūkans', 'loss', 'pāts', 'salns',
        'zelts', 'sudrabs', 'varš', 'bronza', 'zeltains', 'subrabains'
    ];
}
