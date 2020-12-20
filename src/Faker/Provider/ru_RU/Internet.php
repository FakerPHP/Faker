<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\ru_RU;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['yandex.ru', 'ya.ru', 'narod.ru', 'gmail.com', 'mail.ru', 'list.ru', 'bk.ru', 'inbox.ru', 'rambler.ru', 'hotmail.com'];
    protected static $tld = ['com', 'com', 'net', 'org', 'ru', 'ru', 'ru', 'ru'];
}
