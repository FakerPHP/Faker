<?php

declare(strict_types=1);

namespace Faker\Test\Provider\en_IE;

use Faker\Provider\en_IE\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testFirstNameMale(): void
    {
        $name = $this->faker->firstNameMale();
        self::assertNotEmpty($name);
        self::assertIsString($name);
    }

    public function testFirstNameFemale(): void
    {
        $name = $this->faker->firstNameFemale();
        self::assertNotEmpty($name);
        self::assertIsString($name);
    }

    public function testLastName(): void
    {
        $name = $this->faker->lastName();
        self::assertNotEmpty($name);
        self::assertIsString($name);
    }

    public function testName(): void
    {
        $name = $this->faker->name();
        self::assertNotEmpty($name);
        self::assertIsString($name);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
