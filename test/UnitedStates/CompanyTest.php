<?php

declare(strict_types=1);

namespace Faker\Test\UnitedStates;

use Faker\Core\Extension\CompanyExtension;
use Faker\Factory;
use Faker\UnitedStates\Company;
use PHPUnit\Framework\TestCase;

final class CompanyTest extends TestCase
{
    private Company $extension;

    protected function setUp(): void
    {
        $faker = Factory::default();
        $faker->seed(1);
        $this->extension = $faker->ext(CompanyExtension::class);
        parent::setUp();
    }

    public function testCompany(): void
    {
        $value = $this->extension->company();
        self::assertEquals('Kassulke-Erdman', $value);
    }

    public function testCompanySuffix(): void
    {
        $value = $this->extension->companySuffix();
        self::assertEquals('and Sons', $value);
    }

    public function testJobTitle(): void
    {
        $value = $this->extension->jobTitle();
        self::assertEquals('Eligibility Interviewer', $value);
    }

    // @todo ein
}
