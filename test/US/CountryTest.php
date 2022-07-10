<?php

namespace Faker\English\US;

use Faker\Core\Extension\CountryExtension;
use Faker\English\Factory;
use PHPUnit\Framework\TestCase;

final class CountryTest extends TestCase
{
    private Country $extension;

    protected function setUp(): void
    {
        $faker = Factory::unitedStates();
        $faker->seed(1);
        $this->extension = $faker->ext(CountryExtension::class);
        parent::setUp();
    }

    public function testCountry(): void
    {
        $value = $this->extension->country();
        self::assertEquals('Christmas Island', $value);
        $value = $this->extension->country();
        self::assertEquals('Belarus', $value);
    }
}
