<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider;

use Faker\Provider\Address;
use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    public function testLatitude()
    {
        $latitude = $this->faker->latitude();
        self::assertIsFloat($latitude);
        self::assertGreaterThanOrEqual(-90, $latitude);
        self::assertLessThanOrEqual(90, $latitude);
    }

    public function testLongitude()
    {
        $longitude = $this->faker->longitude();
        self::assertIsFloat($longitude);
        self::assertGreaterThanOrEqual(-180, $longitude);
        self::assertLessThanOrEqual(180, $longitude);
    }

    public function testCoordinate()
    {
        $coordinate = $this->faker->localCoordinates();
        self::assertIsArray($coordinate);
        self::assertIsFloat($coordinate['latitude']);
        self::assertGreaterThanOrEqual(-90, $coordinate['latitude']);
        self::assertLessThanOrEqual(90, $coordinate['latitude']);
        self::assertIsFloat($coordinate['longitude']);
        self::assertGreaterThanOrEqual(-180, $coordinate['longitude']);
        self::assertLessThanOrEqual(180, $coordinate['longitude']);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
