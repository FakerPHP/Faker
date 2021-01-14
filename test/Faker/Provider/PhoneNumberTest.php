<?php

namespace Faker\Test\Provider;

use Faker\Calculator\Luhn;
use Faker\Provider\PhoneNumber;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testE164PhoneNumberFormat()
    {
        $number = $this->faker->e164PhoneNumber();
        self::assertMatchesRegularExpression('/^\+[1-9]\d{1,14}$/', $number);
        self::assertLessThanOrEqual(16, strlen($number)); // +\d{2,15}
    }

    public function testImeiReturnsValidNumber()
    {
        $imei = $this->faker->imei();
        self::assertTrue(Luhn::isValid($imei));
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
