<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ckb_IQ;

use Faker\Provider\ckb_IQ\Address;
use Faker\Provider\ckb_IQ\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testCityName(): void
    {
        $cityName = $this->faker->cityName();
        self::assertNotEmpty($cityName);
        self::assertMatchesRegularExpression('/\p{Arabic}/u', $cityName);
    }

    public function testCity(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $city = $this->faker->city();
            self::assertNotEmpty($city);
            self::assertMatchesRegularExpression('/\p{Arabic}/u', $city);
        }
    }

    public function testStreetName(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $streetName = $this->faker->streetName();
            self::assertNotEmpty($streetName);
            self::assertMatchesRegularExpression('/\p{Arabic}/u', $streetName);
        }
    }

    public function testAddress(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $address = $this->faker->address();
            self::assertNotEmpty($address);
            self::assertMatchesRegularExpression('/\p{Arabic}/u', $address);
        }
    }

    public function testPostcode(): void
    {
        $postcode = $this->faker->postcode();
        self::assertMatchesRegularExpression('/^\d{5}$/', $postcode);
    }

    public function testCountry(): void
    {
        $country = $this->faker->country();
        self::assertContains($country, ['عێراق', 'هەرێمی کوردستان']);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);

        yield new Person($this->faker);
    }
}
