<?php

namespace Faker\Test\Provider\ar_EG;

use Faker\Provider\ar_EG\Address;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testCityPrefix()
    {
        $cityPrefix = $this->faker->cityPrefix();
        self::assertIsString($cityPrefix);
    }

    public function testCityName()
    {
        $cityName = $this->faker->cityName();
        self::assertIsString($cityName);
    }

    public function testStreetPrefix()
    {
        $streetPrefix = $this->faker->streetPrefix();
        self::assertIsString($streetPrefix);
    }

    public function testSecondaryAddress()
    {
        $secondaryAddress = $this->faker->secondaryAddress();
        self::assertIsString($secondaryAddress);
    }

    public function testGovernorate()
    {
        $governorate = $this->faker->governorate();
        self::assertIsString($governorate);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
