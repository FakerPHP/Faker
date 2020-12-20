<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\es_VE;

use Faker\Provider\es_VE\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    /**
     * national Id format validator
     */
    public function testNationalId()
    {
        $pattern = '/^[VJGECP]-?\d{8}-?\d$/';
        $rif = $this->faker->taxpayerIdentificationNumber;
        self::assertMatchesRegularExpression($pattern, $rif);

        $rif = $this->faker->taxpayerIdentificationNumber('-');
        self::assertMatchesRegularExpression($pattern, $rif);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
