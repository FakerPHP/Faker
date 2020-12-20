<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\zh_TW;

use Faker\Provider\zh_TW\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    public function testVAT()
    {
        self::assertEquals(8, floor(log10($this->faker->VAT) + 1));
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
