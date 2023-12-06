<?php

declare(strict_types=1);

namespace Faker\Test\Provider\uk_UA;

use Faker\Provider\uk_UA\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testFirstNameMaleReturns(): void
    {
        self::assertEquals('Данило', $this->faker->firstNameMale());
    }

    public function testFirstNameFemaleReturns(): void
    {
        self::assertEquals('Кіра', $this->faker->firstNameFemale());
    }

    public function testMiddleNameMaleReturns(): void
    {
        self::assertEquals('Іванович', $this->faker->middleNameMale());
    }

    public function testMiddleNameFemaleReturns(): void
    {
        self::assertEquals('Іванівна', $this->faker->middleNameFemale());
    }

    public function testLastNameReturns(): void
    {
        self::assertEquals('Панасюк', $this->faker->lastName());
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
