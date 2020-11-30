<?php

namespace Faker\Test\Provider\de_AT;

use Faker\Generator;
use Faker\Provider\de_AT\Person;
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

    public function testSsnWithDefaultValuesCorrect()
    {
        for ($i = 0; $i < 100; $i++) {
            $number = $this->faker->ssn;

            // Should have 10 characters: 3 consecutive number, 1 verification number, 6 birth date
            $this->assertMatchesRegularExpression('/^[1-9]{1}[0-9]{9}$/', $number, '');

            // consecutive number must be between 100 and 999
            $consecutiveNumber = substr($number, 0, 3);
            $this->assertGreaterThanOrEqual(100, $consecutiveNumber);
            $this->assertLessThanOrEqual(999, $consecutiveNumber);
        }
    }

    public function testSsnWithGivenBirthDateCorrect()
    {
        $number = $this->faker->ssn(new \DateTime('2010-09-08 06:05:04'));

        $this->assertEquals('080910', substr($number, 4, 6));

        // Should have 10 characters: 3 consecutive number, 1 verification number, 6 birth date
        $this->assertMatchesRegularExpression('/^[1-9]{1}[0-9]{9}$/', $number, '');

        // consecutive number must be between 100 and 999
        $consecutiveNumber = substr($number, 0, 3);
        $this->assertGreaterThanOrEqual(100, $consecutiveNumber);
        $this->assertLessThanOrEqual(999, $consecutiveNumber);

    }
}
