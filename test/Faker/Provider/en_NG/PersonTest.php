<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\en_NG;

use Faker\Provider\en_NG\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testPersonNameIsAValidString()
    {
        $name = $this->faker->name;

        self::assertNotEmpty($name);
        self::assertIsString($name);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
