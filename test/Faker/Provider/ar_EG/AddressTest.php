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
        self::assertMatchesRegularExpression('/^[\p{Arabic}\s]+$/u', $cityPrefix);
    }

    public function testCityName()
    {
        $cityName = $this->faker->cityName();
        self::assertMatchesRegularExpression('/^[\p{Arabic}\s]+$/u', $cityName);
    }

    public function testStreetPrefix()
    {
        $streetPrefix = $this->faker->streetPrefix();
        self::assertMatchesRegularExpression('/^[\p{Arabic}\s]+$/u', $streetPrefix);
    }

    public function testSecondaryAddress()
    {
        $secondaryAddress = $this->faker->secondaryAddress();
        self::assertMatchesRegularExpression('/^[0-9\p{Arabic}\s]+$/u', $secondaryAddress);
    }

    public function testGovernorate()
    {
        $governorate = $this->faker->governorate();
        self::assertMatchesRegularExpression('/^[\p{Arabic}\s]+$/u', $governorate);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
