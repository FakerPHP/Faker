<?php

namespace Faker\Test\Provider\de_DE;

use Faker\Provider\de_DE\PhoneNumber;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testE164PhoneNumberFormat()
    {
        $number = $this->faker->e164PhoneNumber();
        self::assertMatchesRegularExpression('/^\+49[0-9]{10,}$/', $number);
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
