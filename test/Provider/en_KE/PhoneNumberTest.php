<?php

declare(strict_types=1);

namespace Faker\Provider\en_KE;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testPhoneNumberFormats(): void
    {
        $phoneNumber = $this->faker->phoneNumber;

        self::assertNotEmpty($phoneNumber);
        self::assertIsString($phoneNumber);

        // The formats defined in PhoneNumber::$formats are:
        // +2547########, 07########, +2541########, 01########
        // We check that the generated number matches one of these patterns:
        $pattern = '/^(?:\+2547\d{8}|07\d{8}|\+2541\d{8}|01\d{8})$/';

        self::assertMatchesRegularExpression($pattern, $phoneNumber);
    }

    public function testE164PhoneNumberFormats(): void
    {
        // The provider does not expose a separate e164 method by default,
        // but we can test if the phoneNumber matches e164 formats too.
        $phoneNumber = $this->faker->phoneNumber;

        self::assertNotEmpty($phoneNumber);
        self::assertIsString($phoneNumber);

        // The E.164 formats in PhoneNumber::$e164Formats are:
        // +2547########, +2541########, +25410#######, +25411#######
        $pattern = '/^\+254(?:7\d{8}|1\d{8}|10\d{7}|11\d{7})$/';

        self::assertMatchesRegularExpression($pattern, $phoneNumber);
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
