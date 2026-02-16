<?php

declare(strict_types=1);

namespace Faker\Test\UnitedStates;

use Faker\Core\Extension\CountryExtension;
use Faker\Factory;
use Faker\UnitedStates\Country;
use PHPUnit\Framework\TestCase;

final class CountryTest extends TestCase
{
    private Country $extension;

    protected function setUp(): void
    {
        $faker = Factory::default();
        $faker->seed(1);
        $this->extension = $faker->ext(CountryExtension::class);
        parent::setUp();
    }

    public function testCountry(): void
    {
        $value = $this->extension->countryName();
        self::assertEquals('Rwanda', $value);
    }
}
