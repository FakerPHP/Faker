<?php

namespace Faker\Test\Provider\sv_SE;

use Faker\Provider\sv_SE\PhoneNumber;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testMobileNumber(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $number = $this->faker->mobileNumber;

            foreach(['+467', '+46(0)7', '+46 (0)7', '+46 (0)7', '07'] as $prefix) {
                self::assertStringStartsWith($prefix, $number);
            }
        }
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
