<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\nl_NL;

use Faker\Provider\nl_NL\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testGenerateValidIdNumber()
    {
        $idNumber = $this->faker->idNumber();
        self::assertEquals(9, strlen($idNumber));


        $sum = -1 * $idNumber % 10;

        for ($multiplier = 2; $idNumber > 0; $multiplier++) {
            $val = ($idNumber /= 10) % 10;
            $sum += $multiplier * $val;
        }
        self::assertTrue($sum != 0 && $sum % 11 == 0);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
