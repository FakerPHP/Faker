<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\uk_UA;

use Faker\Provider\uk_UA\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testFirstNameMaleReturns()
    {
        self::assertEquals('Максим', $this->faker->firstNameMale());
    }

    public function testFirstNameFemaleReturns()
    {
        self::assertEquals('Людмила', $this->faker->firstNameFemale());
    }

    public function testMiddleNameMaleReturns()
    {
        self::assertEquals('Миколайович', $this->faker->middleNameMale());
    }

    public function testMiddleNameFemaleReturns()
    {
        self::assertEquals('Миколаївна', $this->faker->middleNameFemale());
    }

    public function testLastNameReturns()
    {
        self::assertEquals('Броваренко', $this->faker->lastName());
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
