<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\en_PH;

use Faker\Provider\en_PH\Address;
use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    public function testProvince()
    {
        $province = $this->faker->province();
        self::assertNotEmpty($province);
        self::assertIsString($province);
    }

    public function testCity()
    {
        $city = $this->faker->city();
        self::assertNotEmpty($city);
        self::assertIsString($city);
    }

    public function testMunicipality()
    {
        $municipality = $this->faker->municipality();
        self::assertNotEmpty($municipality);
        self::assertIsString($municipality);
    }

    public function testBarangay()
    {
        $barangay = $this->faker->barangay();
        self::assertIsString($barangay);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
