<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\en_AU;

use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    public function testCityPrefix()
    {
        $cityPrefix = $this->faker->cityPrefix();
        self::assertNotEmpty($cityPrefix);
        self::assertIsString($cityPrefix);
        self::assertMatchesRegularExpression('/[A-Z][a-z]+/', $cityPrefix);
    }

    public function testStreetSuffix()
    {
        $streetSuffix = $this->faker->streetSuffix();
        self::assertNotEmpty($streetSuffix);
        self::assertIsString($streetSuffix);
        self::assertMatchesRegularExpression('/[A-Z][a-z]+/', $streetSuffix);
    }

    public function testState()
    {
        $state = $this->faker->state();
        self::assertNotEmpty($state);
        self::assertIsString($state);
        self::assertMatchesRegularExpression('/[A-Z][a-z]+/', $state);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
