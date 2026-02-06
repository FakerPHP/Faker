<?php

namespace Faker\Provider\it_IT;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'email.it', 'libero.it', 'yahoo.it', 'outlook.it'];
    protected static $tld = ['com', 'com', 'com', 'net', 'org', 'it', 'it', 'it'];
}
