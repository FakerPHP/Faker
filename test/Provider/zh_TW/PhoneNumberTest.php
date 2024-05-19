<?php

namespace Faker\Provider\zh_TW;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testCellPhoneNumber()
    {
        $no = $this->faker->cellPhoneNumber();

        self::assertMatchesRegularExpression('/^09\d{8}$/', $no);

        $no = $this->faker->cellPhoneNumber(true);

        self::assertMatchesRegularExpression('/^09\d{2}-?\d{3}-?\d{3}$/', $no);
    }

    public function testIntlCellPhoneNumber()
    {
        $no = $this->faker->intlCellPhoneNumber();

        self::assertMatchesRegularExpression('/^\+8869\d{8}$/', $no);

        $no = $this->faker->intlCellPhoneNumber(true);

        self::assertMatchesRegularExpression('/^\+886-9\d{2}-?\d{3}-?\d{3}$/', $no);
    }

    public function testLocalPhoneNumber()
    {
        $no = $this->faker->localPhoneNumber();

        self::assertMatchesRegularExpression('/^\(\d{2,3}\)\d{7,8}$/', $no);

        $no = $this->faker->localPhoneNumber(true);

        self::assertMatchesRegularExpression('/^\(\d{2,3}\)\d{3,4}-?\d{3,4}$/', $no);
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
