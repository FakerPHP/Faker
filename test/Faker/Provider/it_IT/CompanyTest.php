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

use Faker\Provider\it_IT\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    public function testIfTaxIdCanReturnData()
    {
        $vatId = $this->faker->vatId();
        self::assertMatchesRegularExpression('/^IT[0-9]{11}$/', $vatId);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
