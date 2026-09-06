<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ckb_IQ;

use Faker\Provider\ckb_IQ\PhoneNumber;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $number = $this->faker->phoneNumber();
            self::assertMatchesRegularExpression('/^0(66|53|62|50)\d{6}$/', $number);
        }
    }

    public function testMobileNumber(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $number = $this->faker->mobileNumber();
            self::assertMatchesRegularExpression('/^0(75[01]|77[0-3]|78[01]|790)\d{7}$/', $number);
        }
    }

    public function testE164PhoneNumberFormat(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $number = $this->faker->e164PhoneNumber();
            self::assertMatchesRegularExpression('/^\+\d{7,15}$/', $number);
        }
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
