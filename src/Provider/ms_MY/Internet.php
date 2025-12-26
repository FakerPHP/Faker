<?php

namespace Faker\Provider\ms_MY;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = [
        'gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com',
    ];
    protected static $tld = [
        'com', 'net', 'org', 'com.my', 'gov.my', 'edu.my'
    ];
}
