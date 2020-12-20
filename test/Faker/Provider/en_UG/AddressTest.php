<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\en_UG;

use Faker\Provider\en_UG\Address;
use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    public function testCityName()
    {
        $city = $this->faker->cityName();
        self::assertNotEmpty($city);
        self::assertIsString($city);
    }

    public function testDistrict()
    {
        $district = $this->faker->district();
        self::assertNotEmpty($district);
        self::assertIsString($district);
    }

    public function testRegion()
    {
        $region = $this->faker->region();
        self::assertNotEmpty($region);
        self::assertIsString($region);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
