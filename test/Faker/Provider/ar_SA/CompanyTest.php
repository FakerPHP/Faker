<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\ar_SA;

use Faker\Calculator\Luhn;
use Faker\Provider\ar_SA\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    public function testCompanyIdNumberIsValid()
    {
        $companyIdNumber = $this->faker->companyIdNumber;
        self::assertMatchesRegularExpression('/^700\d{7}$/', $companyIdNumber);
        self::assertTrue(Luhn::isValid($companyIdNumber));
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
