<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\pt_BR;

use Faker\Provider\pt_BR\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    public function testCnpjFormatIsValid()
    {
        $cnpj = $this->faker->cnpj(false);
        self::assertMatchesRegularExpression('/\d{8}\d{4}\d{2}/', $cnpj);
        $cnpj = $this->faker->cnpj(true);
        self::assertMatchesRegularExpression('/\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}/', $cnpj);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
