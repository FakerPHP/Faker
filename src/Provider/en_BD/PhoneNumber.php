<?php

namespace Faker\Provider\en_BD;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $mobilePrefixes = [
        '013', '014', '015', '016', '017', '018', '019'
    ];

    protected static $stdCodes = [
        '02',    // Dhaka
        '031',   // Chattogram
        '0721',  // Rajshahi
        '041',   // Khulna
        '0431',  // Barishal
        '0821',  // Sylhet
        '0521',  // Rangpur
    ];

    public function mobileNumber()
    {
        return static::randomElement(static::$mobilePrefixes) . $this->numberBetween(10000000, 99999999);
    }

    public function landlineNumber()
    {
        return static::randomElement(static::$stdCodes) . '-' . $this->numberBetween(100000, 999999);
    }

    public function phoneNumber()
    {
        return $this->randomElement([
            $this->mobileNumber(),
            $this->landlineNumber()
        ]);
    }
}
