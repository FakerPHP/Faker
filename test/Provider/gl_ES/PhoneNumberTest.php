<?php

declare(strict_types=1);

namespace Faker\Test\Provider\gl_ES;

use Faker\Provider\gl_ES\PhoneNumber;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testPhoneNumberHasGalicianPrefix(): void
    {
        self::assertMatchesRegularExpression('/^(\+34 )?98[1268]/', $this->faker->phoneNumber());
    }

    public function testMobileNumber(): void
    {
        self::assertNotEquals('', $this->faker->mobileNumber());
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
