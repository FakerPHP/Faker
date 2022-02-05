<?php

namespace Faker\Test\Provider\ar_DZ;

use Faker\Calculator\Luhn;
use Faker\Provider\ar_DZ\Company;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class CompanyTest extends TestCase
{
    public function testCompanyTaxIdNumberIsValid()
    {
        $companyTaxIdNumber = $this->faker->companyTaxIdNumber();
        self::assertMatchesRegularExpression('/\d{15}$/', $companyTaxIdNumber);
        self::assertTrue(Luhn::isValid($companyTaxIdNumber));
    }

    public function testCompanyTradeRegisterNumberIsValid()
    {
        $companyTradeRegisterNumber = $this->faker->companyTradeRegisterNumber();
        self::assertMatchesRegularExpression('/\d{9}$/', $companyTradeRegisterNumber);
        self::assertTrue(Luhn::isValid($companyTradeRegisterNumber));
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
