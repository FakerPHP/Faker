<?php

namespace Faker\Test\Provider\it_IT;

use Faker\Provider\it_IT\PhoneNumber;
use Faker\Test\TestCase;

final class PhoneNumberTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; ++$i) {
            $number = $this->faker->phoneNumber();
            self::assertMatchesRegularExpression('/^(((\+39 )?((3[1-9]\d)|(0[1-9]\d{0,1})) \d{3,4} \d{3,4})|((\+39)?(0|3)[1-9]\d{7,9}))$/', $number);
        }
    }

    public function testE164PhoneNumberFormat(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $number = $this->faker->e164PhoneNumber();
            self::assertMatchesRegularExpression('/^\+39(0|3)[1-9]\d{7,9}$/', $number);
        }
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
