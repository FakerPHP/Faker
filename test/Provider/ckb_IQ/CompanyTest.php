<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ckb_IQ;

use Faker\Provider\ckb_IQ\Company;
use Faker\Provider\ckb_IQ\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class CompanyTest extends TestCase
{
    public function testCompany(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $company = $this->faker->company();
            self::assertNotEmpty($company);
            self::assertMatchesRegularExpression('/\p{Arabic}/u', $company);
        }
    }

    public function testCompanyField(): void
    {
        $companyField = $this->faker->companyField();
        self::assertNotEmpty($companyField);
        self::assertMatchesRegularExpression('/\p{Arabic}/u', $companyField);
    }

    public function testContract(): void
    {
        $contract = $this->faker->contract();
        self::assertNotEmpty($contract);
        self::assertMatchesRegularExpression('/\p{Arabic}/u', $contract);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);

        yield new Person($this->faker);
    }
}
