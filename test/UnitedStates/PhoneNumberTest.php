<?php

declare(strict_types=1);

namespace Faker\Test\UnitedStates;

use Faker\Core\Extension\PhoneNumberExtension;
use Faker\Factory;
use Faker\UnitedStates\PhoneNumber;
use PHPUnit\Framework\TestCase;

final class PhoneNumberTest extends TestCase
{
    private PhoneNumber $extension;

    protected function setUp(): void
    {
        $faker = Factory::default();
        $faker->seed(1);
        $this->extension = $faker->ext(PhoneNumberExtension::class);
        parent::setUp();
    }

    public function testPhoneNumber(): void
    {
        $value = $this->extension->phoneNumber();
        self::assertEquals('(530) 233-6139', $value);
    }

    public function testE164PhoneNumber(): void
    {
        $value = $this->extension->e164PhoneNumber();
        self::assertEquals('+15302336139', $value);
    }

    // @todo areaCode
    // @todo exchangeCode
}
