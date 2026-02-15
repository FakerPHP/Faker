<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ja_JP;

use Faker\Provider\ja_JP\Address;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testPostcodeMatchesFormat(): void
    {
        $postcode = Address::postcode();
        self::assertMatchesRegularExpression('/^[0-9]{7}$/', str_replace('-', '', $postcode));
    }
}
