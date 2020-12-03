<?php

namespace Faker\Test\Provider\ar_SA;

use Faker\Calculator\Luhn;
use Faker\Generator;
use Faker\Provider\ar_SA\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    /**
     * @var Generator
     */
    private $faker;

    protected function setUp(): void
    {
        $faker = new Generator();
        $faker->addProvider(new Company($faker));
        $this->faker = $faker;
    }

    public function testCompanyIdNumberIsValid()
    {
        $companyIdNumber = $this->faker->companyIdNumber;
        $this->assertMatchesRegularExpression('/^700\d{7}$/', $companyIdNumber);
        $this->assertTrue(Luhn::isValid($companyIdNumber));
    }
}
