<?php

namespace Faker\Test\Provider\uk_UA;

use Faker\Provider\uk_UA\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    /**
     * @requires PHP < 8.3
     */
    public function testFirstNameMaleReturns(): void
    {
        self::assertEquals('Максим', $this->faker->firstNameMale());
    }

    /**
     * @requires PHP < 8.3
     */
    public function testFirstNameFemaleReturns(): void
    {
        self::assertEquals('Людмила', $this->faker->firstNameFemale());
    }

    /**
     * @requires PHP < 8.3
     */
    public function testMiddleNameMaleReturns(): void
    {
        self::assertEquals('Миколайович', $this->faker->middleNameMale());
    }

    /**
     * @requires PHP < 8.3
     */
    public function testMiddleNameFemaleReturns(): void
    {
        self::assertEquals('Миколаївна', $this->faker->middleNameFemale());
    }

    /**
     * @requires PHP < 8.3
     */
    public function testLastNameReturns(): void
    {
        self::assertEquals('Броваренко', $this->faker->lastName());
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
