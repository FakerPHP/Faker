<?php

namespace Faker\Provider\in_BD;

class Address extends \Faker\Provider\Address
{
    protected static $districts = [
        'Dhaka', 'Chattogram', 'Rajshahi', 'Khulna', 'Barishal',
        'Sylhet', 'Rangpur', 'Mymensingh', 'Cumilla', 'Narayanganj'
    ];

    protected static $streets = [
        'Station Road', 'College Road', 'Banani Road', 'Gulshan Avenue', 'New Market Road',
        'Airport Road', 'Baily Road', 'Kakrail Road', 'Kazi Nazrul Islam Avenue', 'Mirpur Road'
    ];

    public function district()
    {
        return static::randomElement(static::$districts);
    }

    public function streetName()
    {
        return static::randomElement(static::$streets);
    }

    public function streetAddress()
    {
        return $this->numberBetween(1, 200) . ' ' . $this->streetName();
    }

    public function address()
    {
        return $this->streetAddress() . ', ' . $this->district() . ' ' . $this->postcode();
    }

    public function postcode()
    {
        return (string) $this->numberBetween(1000, 9999);
    }
}
