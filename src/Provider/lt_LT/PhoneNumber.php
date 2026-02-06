<?php

namespace Faker\Provider\lt_LT;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '06#######',
        '0 6## #####',
        '+370 6## ## ###',
        '+3706#######',
        '(0 5) ### ####',
        '+370 5 ### ####',
        '+370 46 ## ## ##',
        '(0 46) ## ## ##',
    ];
}
