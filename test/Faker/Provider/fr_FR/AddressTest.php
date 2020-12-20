<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\fr_FR;

use Faker\Provider\fr_FR\Address;
use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    public function testSecondaryAddress()
    {
        $secondaryAdress = $this->faker->secondaryAddress();
        self::assertNotEmpty($secondaryAdress);
        self::assertIsString($secondaryAdress);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
