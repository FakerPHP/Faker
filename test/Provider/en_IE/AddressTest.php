<?php

declare(strict_types=1);

namespace Faker\Test\Provider\en_IE;

use Faker\Provider\en_IE\Address;
use Faker\Provider\en_IE\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testPostcode(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $postcode = $this->faker->postcode();
            self::assertNotEmpty($postcode);
            self::assertIsString($postcode);
            self::assertMatchesRegularExpression('/^[A-Z]\d[\dW] [A-Z0-9]{4}$/', $postcode);
        }
    }

    public function testEircode(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $eircode = $this->faker->eircode();
            self::assertNotEmpty($eircode);
            self::assertMatchesRegularExpression('/^[A-Z]\d[\dW] [A-Z0-9]{4}$/', $eircode);
        }
    }

    public function testCounty(): void
    {
        $county = $this->faker->county();
        self::assertNotEmpty($county);
        self::assertIsString($county);
    }

    public function testCityName(): void
    {
        $city = $this->faker->city();
        self::assertNotEmpty($city);
        self::assertIsString($city);
    }

    public function testSecondaryAddress(): void
    {
        $address = $this->faker->secondaryAddress();
        self::assertNotEmpty($address);
        self::assertIsString($address);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
        yield new Person($this->faker);
    }
}
