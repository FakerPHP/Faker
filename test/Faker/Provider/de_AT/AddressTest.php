<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\de_AT;

use Faker\Provider\de_AT\Address;
use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    /**
     * @see https://en.wikipedia.org/wiki/List_of_postal_codes_in_Austria
     */
    public function testPostcodeReturnsPostcodeThatMatchesAustrianFormat()
    {
        $postcode = $this->faker->postcode;

        self::assertMatchesRegularExpression('/^[1-9]\d{3}$/', $postcode);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
