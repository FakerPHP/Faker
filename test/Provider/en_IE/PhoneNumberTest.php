<?php

declare(strict_types=1);

namespace Faker\Test\Provider\en_IE;

use Faker\Provider\en_IE\PhoneNumber;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testMobileNumber(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $number = $this->faker->mobileNumber();
            self::assertMatchesRegularExpression('/^08[35679] \d{3} \d{4}$/', $number);
        }
    }

    public function testE164PhoneNumberFormat(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $number = $this->faker->e164PhoneNumber();
            self::assertMatchesRegularExpression('/^\+353\d{1,13}$/', $number);
        }
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
