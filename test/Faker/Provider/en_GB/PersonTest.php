<?php

namespace Faker\Test\Provider\en_GB;

use Faker\Provider\en_GB\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testNationalInsuranceNumber()
    {
        $result = $this->faker->nino;

        self::assertMatchesRegularExpression('/^[A-Z]{2}\d{6}[A-Z]{1}$/', $result);

        self::assertFalse(in_array($result[0], ['D', 'F', 'I', 'Q', 'U', 'V']));
        self::assertFalse(in_array($result[1], ['D', 'F', 'I', 'Q', 'U', 'V']));
        self::assertFalse(in_array($result, ['BG', 'GB', 'NK', 'KN', 'TN', 'NT', 'ZZ']));
        self::assertFalse($result[1] === 'O');
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
