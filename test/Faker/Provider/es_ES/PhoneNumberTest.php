<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\es_ES;

use Faker\Provider\es_ES\PhoneNumber;
use Faker\Test\TestCase;

final class PhoneNumberTest extends TestCase
{
    public function testMobileNumber()
    {
        self::assertNotEquals('', $this->faker->mobileNumber());
    }

    public function testTollFreeNumber()
    {
        self::assertEquals(11, strlen($this->faker->tollFreeNumber()));
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
