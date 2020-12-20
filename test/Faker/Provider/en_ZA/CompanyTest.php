<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\en_ZA;

use Faker\Provider\en_ZA\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    public function testGenerateValidCompanyNumber()
    {
        $companyRegNo = $this->faker->companyNumber();

        self::assertEquals(14, strlen($companyRegNo));
        self::assertMatchesRegularExpression('#^\d{4}/\d{6}/\d{2}$#', $companyRegNo);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
