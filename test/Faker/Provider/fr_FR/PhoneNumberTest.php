<?php

namespace Faker\Test\Provider\fr_FR;

use Faker\Provider\fr_FR\PhoneNumber;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testMobileNumber(): void
    {
        $mobileNumber = $this->faker->mobileNumber();
        self::assertMatchesRegularExpression('/^(\+33 |\+33 \(0\)|0)([67])(?:(\s)?\d{2}){4}$/', $mobileNumber);
    }

    public function testMobileNumber06Format(): void
    {
        $mobileNumberFormat = $this->faker->phoneNumber06();
        self::assertMatchesRegularExpression('/^([0-24-8]\d|3[0-8]|9[589])(\d{2}){3}$/', $mobileNumberFormat);
    }

    public function testMobileNumber06WithSeparatorFormat(): void
    {
        $mobileNumberFormat = $this->faker->phoneNumber06WithSeparator();
        self::assertMatchesRegularExpression('/^([0-24-8]\d|3[0-8]|9[589])( \d{2}){3}$/', $mobileNumberFormat);
    }

    public function testMobileNumber07Format(): void
    {
        $mobileNumberFormat = $this->faker->phoneNumber07();
        self::assertMatchesRegularExpression('/^([3-8]\d)(\d{2}){3}$/', $mobileNumberFormat);
    }

    public function testMobileNumber07WithSeparatorFormat(): void
    {
        $mobileNumberFormat = $this->faker->phoneNumber07WithSeparator();
        self::assertMatchesRegularExpression('/^([3-8]\d)( \d{2}){3}$/', $mobileNumberFormat);
    }

    public function testServiceNumber(): void
    {
        $serviceNumber = $this->faker->serviceNumber();
        self::assertMatchesRegularExpression('/^(\+33 |\+33 \(0\)|0)8(?:(\s)?\d{2}){4}$/', $serviceNumber);
    }

    public function testServiceNumberFormat(): void
    {
        $serviceNumberFormat = $this->faker->phoneNumber08();
        self::assertMatchesRegularExpression('/^(([012])\d|9[^46])\d{6}$/', $serviceNumberFormat);
    }

    public function testServiceNumberWithSeparatorFormat(): void
    {
        $serviceNumberFormat = $this->faker->phoneNumber08WithSeparator();
        self::assertMatchesRegularExpression('/^(([012])\d|9[^46])( \d{2}){3}$/', $serviceNumberFormat);
    }

    public function testE164PhoneNumberFormat(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $number = $this->faker->e164PhoneNumber();
            self::assertMatchesRegularExpression('/^\+33\d{1,13}$/', $number);
        }
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
