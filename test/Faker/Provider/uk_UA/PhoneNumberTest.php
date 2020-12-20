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

use Faker\Provider\uk_UA\PhoneNumber;
use Faker\Test\TestCase;

final class PhoneNumberTest extends TestCase
{
    public function testPhoneNumberFormat()
    {
        $pattern = "/((\+38)(((\(\d{3}\))\d{7}|(\(\d{4}\))\d{6})|(\d{8})))|0\d{9}/";
        $phoneNumber = $this->faker->phoneNumber;
        self::assertSame(
            preg_match($pattern, $phoneNumber),
            1,
            'Phone number format ' . $phoneNumber . ' is wrong!'
        );
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
