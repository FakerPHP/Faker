<?php

namespace Faker\English\US;

use Faker\Core\Extension\AddressExtension;
use Faker\English\Factory;
use PHPUnit\Framework\TestCase;

final class AddressTest extends TestCase
{
    private Address $extension;

    protected function setUp(): void
    {
        $faker = Factory::unitedStates();
        $faker->seed(1);
        $this->extension = $faker->ext(AddressExtension::class);
        parent::setUp();
    }

    public function testAddress(): void
    {
        $value = $this->extension->address();
        self::assertEquals('99325 Dietrich Estates Suite 761\nPort Darienmouth, KS 93553', $value);
        $value = $this->extension->address();
        self::assertEquals('33132 Michele Oval\nNew Derekville, VA 44362-8371', $value);
    }

    public function testCity(): void
    {
        $value = $this->extension->city();
        self::assertEquals('East Lula', $value);
        $value = $this->extension->city();
        self::assertEquals('Pourostown', $value);
    }

    public function testPostcode(): void
    {
        $value = $this->extension->postcode();
        self::assertEquals('00708-6397', $value);
        $value = $this->extension->postcode();
        self::assertEquals('93255', $value);
    }

    public function testStreetName(): void
    {
        $value = $this->extension->streetName();
        self::assertEquals('Jacobi Loaf', $value);
        $value = $this->extension->streetName();
        self::assertEquals('Mable Wells', $value);
    }

    public function testStreetAddress(): void
    {
        $value = $this->extension->streetAddress();
        self::assertEquals('9720 Pouros Wells Suite 855', $value);
        $value = $this->extension->streetAddress();
        self::assertEquals('260 Goyette Forge', $value);
    }

    public function testBuildingNumber(): void
    {
        $value = $this->extension->buildingNumber();
        self::assertEquals('70070', $value);
        $value = $this->extension->buildingNumber();
        self::assertEquals('899', $value);
    }

    public function testState(): void
    {
        $value = $this->extension->state();
        self::assertEquals('Connecticut', $value);
        $value = $this->extension->state();
        self::assertEquals('Kansas', $value);
    }

    public function testStateAbbreviation(): void
    {
        $value = $this->extension->stateAbbreviation();
        self::assertEquals('CT', $value);
        $value = $this->extension->stateAbbreviation();
        self::assertEquals('KS', $value);
    }

    public function testSecondaryAddress(): void
    {
        $value = $this->extension->secondaryAddress();
        self::assertEquals('Suite 007', $value);
        $value = $this->extension->secondaryAddress();
        self::assertEquals('Apt. 932', $value);
    }
}
