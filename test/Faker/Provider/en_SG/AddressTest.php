<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\en_SG;

use Faker\Provider\en_SG\Address;
use Faker\Test\TestCase;

final class AddressTest extends TestCase
{
    public function testStreetNumber()
    {
        self::assertMatchesRegularExpression('/^\d{2,3}$/', $this->faker->streetNumber());
    }

    public function testBlockNumber()
    {
        self::assertMatchesRegularExpression('/^Blk\s*\d{2,3}[A-H]*$/i', $this->faker->blockNumber());
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
