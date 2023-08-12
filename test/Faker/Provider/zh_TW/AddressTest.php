<?php

namespace Faker\Provider\zh_TW;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testCounty(): void
    {
        $classRef = new \ReflectionClass(Address::class);
        $property = $classRef->getProperty('city');
        $city = array_keys($property->getValue());

        $county = $this->faker->county();

        self::assertTrue(in_array($county, $city, true));
    }

    public function testDistOf(): void
    {
        $classRef = new \ReflectionClass(Address::class);
        $property = $classRef->getProperty('city');
        $city = $property->getValue();

        $county = $this->faker->county();
        $dist = $this->faker->distOf($county);

        self::assertTrue(in_array($dist, $city[$county], true));
    }

    public function testDist(): void
    {
        $classRef = new \ReflectionClass(Address::class);
        $property = $classRef->getProperty('city');
        $city = $property->getValue();

        $distSet = [];

        foreach ($city as $distList) {
            foreach ($distList as $distItem) {
                $distSet[] = $distItem;
            }
        }

        $dist = $this->faker->dist();

        self::assertTrue(in_array($dist, $distSet, true));
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
