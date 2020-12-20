<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\ja_JP;

use Faker\Provider\ja_JP\PhoneNumber;
use Faker\Test\TestCase;

final class PhoneNumberTest extends TestCase
{
    public function testPhoneNumber()
    {
        for ($i = 0; $i < 10; $i++) {
            $phoneNumber = $this->faker->phoneNumber;
            self::assertNotEmpty($phoneNumber);
            self::assertMatchesRegularExpression('/^0\d{1,4}-\d{1,4}-\d{3,4}$/', $phoneNumber);
        }
    }


    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
