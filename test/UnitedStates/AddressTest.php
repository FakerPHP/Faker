<?php

declare(strict_types=1);

namespace Faker\Test\UnitedStates;

use Faker\Core\Extension\AddressExtension;
use Faker\Factory;
use Faker\UnitedStates\Address;
use PHPUnit\Framework\TestCase;

final class AddressTest extends TestCase
{
    private Address $extension;

    protected function setUp(): void
    {
        $faker = Factory::default();
        $faker->seed(1);
        $this->extension = $faker->ext(AddressExtension::class);
        parent::setUp();
    }

    public function testStreetSuffix(): void
    {
        $value = $this->extension->streetSuffix();
        self::assertEquals('Wall', $value);
    }

    public function testBuildingNumber(): void
    {
        $value = $this->extension->buildingNumber();
        self::assertEquals('1139', $value);
    }

    public function testState(): void
    {
        $value = $this->extension->state();
        self::assertEquals('Maine', $value);
    }

    public function testCity(): void
    {
        $value = $this->extension->city();
        self::assertEquals('South Wilmer', $value);
    }

    public function testPostcode(): void
    {
        $value = $this->extension->postcode();
        self::assertEquals('09377-0124', $value);
    }

    public function testAddress(): void
    {
        $value = $this->extension->address();
        self::assertEquals("83368 Bode Estates Suite 432\nPort Priceport, WI 09721", $value);
    }

    public function testStreetName(): void
    {
        $value = $this->extension->streetName();
        self::assertEquals('Kassulke Loaf', $value);
    }

    public function testStreetAddress(): void
    {
        $value = $this->extension->streetAddress();
        self::assertEquals('624 Konopelski Summit Suite 759', $value);
    }

    // @todo
    //secondaryAddress
    //state
    //stateAbbr
    //citySuffix
    //streetSuffix
}
