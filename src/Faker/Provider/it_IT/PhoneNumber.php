<?php

namespace Faker\Provider\it_IT;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    /**
     * @see https://en.wikipedia.org/wiki/Telephone_numbers_in_Italy
     */
    protected static $formats = [
        // Landline numbers
        '0%# ### ###',
        '0%# ### ####',
        '02 #### ###', // Milan
        '02 #### ####',
        '06 #### ###', // Rome
        '06 #### ####',

        // Mobile numbers
        '3%# ### ####',

        // International formats
        '+39 0%# ### ###',
        '+39 0%# ### ####',
        '+39 02 #### ###',
        '+39 02 #### ####',
        '+39 06 #### ###',
        '+39 06 #### ####',
        '+39 3%# ### ####',
    ];

    protected static $e164Formats = [
        '+390%#######',
        '+390%########',
        '+393%#######',
        '+393%########',
    ];
}
