<?php

namespace Faker\Provider\da_DK;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
class Internet extends \Faker\Provider\Internet
{
    /**
     * @var array some safe email TLD
     */
    protected static $safeEmailTld = [
        'org', 'com', 'net', 'dk', 'dk', 'dk',
    ];

    /**
     * @var array some email domains in Denmark
     */
    protected static $freeEmailDomain = [
        'gmail.com', 'yahoo.com', 'yahoo.dk', 'hotmail.com', 'hotmail.dk', 'mail.dk', 'live.dk',
    ];

    /**
     * @var array some TLD
     */
    protected static $tld = [
        'com', 'com', 'com', 'biz', 'info', 'net', 'org', 'dk', 'dk', 'dk',
    ];
}
