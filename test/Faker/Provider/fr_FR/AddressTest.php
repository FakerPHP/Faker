<?php

namespace Faker\Test\Provider\fr_FR;

use Faker\Provider\fr_FR\Address;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testSecondaryAddress()
    {
        $secondaryAddress = $this->faker->secondaryAddress();

        self::assertNotEmpty($secondaryAddress);
        self::assertIsString($secondaryAddress);
    }

    public function testStreetPrefix()
    {
        $streetPrefix = $this->faker->streetPrefix();

        self::assertNotEmpty($streetPrefix);
        self::assertIsString($streetPrefix);
    }

    public function testRegion()
    {
        $region = $this->faker->region();

        self::assertNotEmpty($region);
        self::assertIsString($region);
    }

    public function testDepartment()
    {
        $department = $this->faker->department();

        self::assertIsArray($department);
        self::assertCount(1, $department);

        foreach ($department as $departmentNumber => $departmentName) {
            self::assertNotEmpty($departmentName);
            self::assertIsString($departmentName);
            self::assertNotEmpty($departmentNumber);
            self::assertIsString($departmentNumber);
        }
    }

    public function testDepartmentName()
    {
        $departmentName = $this->faker->departmentName();

        self::assertNotEmpty($departmentName);
        self::assertIsString($departmentName);
    }

    public function testDepartmentNumber()
    {
        $departmentNumber = $this->faker->departmentNumber();

        self::assertNotEmpty($departmentNumber);
        self::assertIsString($departmentNumber);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
