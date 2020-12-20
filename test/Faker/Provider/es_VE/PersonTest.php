<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\es_VE;

use Faker\Provider\es_VE\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testNationalId()
    {
        $pattern = '/(?:^V-?\d{5,9}$)|(?:^E-?\d{8,9}$)/';

        $cedula = $this->faker->nationalId;
        self::assertMatchesRegularExpression($pattern, $cedula);

        $cedula = $this->faker->nationalId('-');
        self::assertMatchesRegularExpression($pattern, $cedula);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
