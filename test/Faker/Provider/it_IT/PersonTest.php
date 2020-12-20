<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\it_IT;

use Faker\Provider\it_IT\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testIfTaxIdCanReturnData()
    {
        $taxId = $this->faker->taxId();
        self::assertMatchesRegularExpression('/^[a-zA-Z]{6}[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{3}[a-zA-Z]$/', $taxId);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
