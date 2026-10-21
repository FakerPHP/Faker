<?php

namespace Faker\Test\Provider\he_IL;

use Faker\Provider\he_IL\PhoneNumber;
use Faker\Test\TestCase;

final class PhoneNumberTest extends TestCase
{
    public function testMobileNumber()
    {
        $provider = new PhoneNumber($this->faker);
        $this->assertMatchesRegularExpression('/^05\d-\d{7}$/', $provider->mobileNumber());
    }

    public function testLandlineNumber()
    {
        $provider = new PhoneNumber($this->faker);
        $this->assertMatchesRegularExpression('/^0\d-\d{7}$/', $provider->landlineNumber());
    }

    public function testInternationalMobileNumber()
    {
        $provider = new PhoneNumber($this->faker);
        $this->assertMatchesRegularExpression('/^972-5\d-\d{7}$/', $provider->internationalMobileNumber());
    }

    public function testInternationalLandline()
    {
        $provider = new PhoneNumber($this->faker);
        $this->assertMatchesRegularExpression('/^972-\d-\d{8}$/', $provider->internationalLandline());
    }

    public function testClearMobilePhoneNumber()
    {
        $provider = new PhoneNumber($this->faker);
        $this->assertMatchesRegularExpression('/^05\d{8}$/', $provider->clearMobilePhoneNumber());
    }

    public function testClearMobileNumber()
    {
        $provider = new PhoneNumber($this->faker);
        $this->assertMatchesRegularExpression('/^05\d{8}$/', $provider->clearMobileNumber());
    }
}
