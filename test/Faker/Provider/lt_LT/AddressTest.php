<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\lt_LT;

use Faker\Provider\lt_LT\Address;
use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    public function testMunicipality()
    {
        self::assertStringEndsWith('savivaldybė', $this->faker->municipality());
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
