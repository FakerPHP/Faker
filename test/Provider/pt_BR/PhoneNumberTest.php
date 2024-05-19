<?php

declare(strict_types=1);

namespace Faker\Test\Provider\pt_BR;

use Faker\Provider;
use Faker\Test;

/**
 * @covers \Faker\Provider\pt_BR\PhoneNumber
 */
final class PhoneNumberTest extends Test\TestCase
{
    public function testPhoneReturnsPhoneNumberWhenArgumentIsFalse(): void
    {
        $phoneNumber = $this->faker->phone(false);

        self::assertIsString($phoneNumber);
        self::assertNotEmpty($phoneNumber);
    }

    public function testPhoneReturnsPhoneNumberWhenArgumentIsTrue(): void
    {
        $phoneNumber = $this->faker->phone(true);

        self::assertIsString($phoneNumber);
        self::assertNotEmpty($phoneNumber);
    }

    public function testPhoneNumberReturnsPhoneNumber(): void
    {
        $phoneNumber = $this->faker->phoneNumber();

        self::assertIsString($phoneNumber);
        self::assertNotEmpty($phoneNumber);
    }

    public function testPhoneNumberClearedReturnsPhoneNumber(): void
    {
        $phoneNumber = $this->faker->phoneNumberCleared();

        self::assertIsString($phoneNumber);
        self::assertNotEmpty($phoneNumber);
    }

    protected function getProviders(): iterable
    {
        yield new Provider\pt_BR\PhoneNumber($this->faker);
    }
}
