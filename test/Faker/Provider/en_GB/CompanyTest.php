<?php

namespace Faker\Provider\en_GB;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class CompanyTest extends TestCase
{
    public function testVat()
    {
        $number = $this->faker->vat();
        self::assertEquals(1, preg_match('/^GB[\d]{3} [\d]{4} [\d]{2}$/', $number));
    }

    public function testVatDefaultType()
    {
        $this->testVat();
    }

    public function testVatBranchType()
    {
        $number = $this->faker->vat(Company::VAT_TYPE_BRANCH);
        self::assertEquals(1, preg_match('/^GB[\d]{3} [\d]{4} [\d]{2} [\d]{3}$/', $number));
    }

    public function testVatGovernmentType()
    {
        $number = $this->faker->vat(Company::VAT_TYPE_GOVERNMENT);
        $match = preg_match('/^GBGD([\d]{3})$/', $number, $matches);
        self::assertEquals(1, $match);
        self::assertTrue($matches[1] < 499);
    }

    public function testVatHealthAuthorityType()
    {
        $number = $this->faker->vat(Company::VAT_TYPE_HEALTH_AUTHORITY);
        $match = preg_match('/^GBHA([\d]{3})$/', $number, $matches);
        self::assertEquals(1, $match);
        self::assertTrue($matches[1] > 499);
        self::assertTrue($matches[1] < 1000);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
