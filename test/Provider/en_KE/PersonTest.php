<?php

declare(strict_types=1);

namespace Faker\Test\Provider\en_KE;

use Faker\Provider\en_KE\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testFirstNameMale(): void
    {
        for ($i = 0; $i < 100; ++$i) {
            $name = $this->faker->firstNameMale();
            self::assertIsString($name);
            self::assertNotEmpty($name);
        }
    }

    public function testFirstNameFemale(): void
    {
        for ($i = 0; $i < 100; ++$i) {
            $name = $this->faker->firstNameFemale();
            self::assertIsString($name);
            self::assertNotEmpty($name);
        }
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
