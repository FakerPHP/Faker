<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\pt_PT;

use Faker\Provider\pt_PT\Address;
use Faker\Provider\pt_PT\Person;
use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    public function testPostCodeIsValid()
    {
        $main = '[1-9]{1}[0-9]{2}[0,1,4,5,9]{1}';
        $pattern = "/^($main)|($main-[0-9]{3})+$/";
        $postcode = $this->faker->postcode();
        self::assertSame(preg_match($pattern, $postcode), 1, $postcode);
    }

    public function testAddressIsSingleLine()
    {
        $this->faker->addProvider(new Person($this->faker));

        $address = $this->faker->address();
        self::assertFalse(strstr($address, "\n"));
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
