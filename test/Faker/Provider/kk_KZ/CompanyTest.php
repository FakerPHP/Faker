<?php

namespace Faker\Test\Provider\kk_KZ;

use Faker\Generator;
use Faker\Provider\kk_KZ\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    /**
     * @var Generator
     */
    private $faker;

    protected function setUp(): void
    {
        $this->faker = new Generator();
        $this->faker->addProvider(new Company($this->faker));
    }

    public function testBusinessIdentificationNumberIsValid()
    {
        $registrationDate             = new \DateTime('now');
        $businessIdentificationNumber = $this->faker->businessIdentificationNumber($registrationDate);
        $registrationDateAsString     = $registrationDate->format('ym');

        $this->assertMatchesRegularExpression(
            "/^(" . $registrationDateAsString . ")([4-6]{1})([0-3]{1})(\\d{6})$/",
            $businessIdentificationNumber
        );
    }
}
