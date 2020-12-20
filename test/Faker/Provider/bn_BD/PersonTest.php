<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\bn_BD;

use Faker\Provider\bn_BD\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testIfFirstNameMaleCanReturnData()
    {
        $firstNameMale = $this->faker->firstNameMale();
        self::assertNotEmpty($firstNameMale);
    }

    public function testIfFirstNameFemaleCanReturnData()
    {
        $firstNameFemale = $this->faker->firstNameFemale();
        self::assertNotEmpty($firstNameFemale);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
