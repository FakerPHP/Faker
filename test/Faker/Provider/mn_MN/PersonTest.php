<?php

namespace Faker\Test\Provider\mn_MN;

use Faker\Provider\mn_MN\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testName()
    {
        self::assertMatchesRegularExpression('/^[\p{Cyrillic}]\.[\w\W]+$/u', $this->faker->name);
    }

    public function testIdNumber()
    {
        self::assertMatchesRegularExpression('/^[\p{Cyrillic}]{2}\d{8}$/u', $this->faker->idNumber);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
