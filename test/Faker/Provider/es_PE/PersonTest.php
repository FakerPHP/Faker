<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\es_PE;

use Faker\Provider\es_PE\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testDNI()
    {
        $dni = $this->faker->dni;
        self::assertMatchesRegularExpression('/\A[0-9]{8}\Z/', $dni);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
