<?php

namespace Faker\Test\Provider\ar_SA;

use Faker\Calculator\Luhn;
use Faker\Generator;
use Faker\Provider\ar_SA\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    /**
     * @var Generator
     */
    private $faker;

    protected function setUp(): void
    {
        $faker = new Generator();
        $faker->addProvider(new Person($faker));
        $this->faker = $faker;
    }

    public function testIdNumber()
    {
        $idNumber = $this->faker->idNumber;
        $this->assertMatchesRegularExpression('/^[1|2]\d{9}$/', $idNumber);
        $this->assertTrue(Luhn::isValid($idNumber));
    }

    public function testNationalIdNumber()
    {
        $nationalIdNumber = $this->faker->nationalIdNumber;
        $this->assertMatchesRegularExpression('/^1\d{9}$/', $nationalIdNumber);
        $this->assertTrue(Luhn::isValid($nationalIdNumber));
    }

    public function testForeignerIdNumber()
    {
        $foreignerIdNumber = $this->faker->foreignerIdNumber;
        $this->assertMatchesRegularExpression('/^2\d{9}$/', $foreignerIdNumber);
        $this->assertTrue(Luhn::isValid($foreignerIdNumber));
    }
}
