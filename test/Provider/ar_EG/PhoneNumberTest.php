<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ar_EG;

use Faker\Provider\ar_EG\PhoneNumber;
use Faker\Test\TestCase;


final class PhoneNumberTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        self::assertMatchesRegularExpression('/^(\+20\s?)?(\d{1,2})\s?\d{3,4}\s?\d{4}$|^(\+20\s?)?(\d{1,2})\d{7}$/', $this->faker->phoneNumber());
    }

    public function testMobileNumber(): void
    {
        self::assertMatchesRegularExpression('/^(\+20\s?)?(010|011|012|015)\s?\d{3,4}\s?\d{4}$|^(\+20\s?)?(010|011|012|015)\d{8}$/', $this->faker->mobileNumber());
    }


    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
