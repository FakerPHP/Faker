<?php

namespace Faker\Test\Provider\ne_NP;

use Faker\Provider\ne_NP\Payment;
use Faker\Test\TestCase;

final class PaymentTest extends TestCase
{
    public function testCommercialBank(): void
    {
        $str = $this->faker->commercialBank();
        self::assertIsString($str);
    }

    public function testDevelopmentBank(): void
    {
        $str = $this->faker->developmentBank();
        self::assertIsString($str);
    }

    public function testFinanceCompany(): void
    {
        $str = $this->faker->financeCompany();
        self::assertIsString($str);
    }

    public function testMicroFinance(): void
    {
        $str = $this->faker->microFinance();
        self::assertIsString($str);
        self::assertStringContainsString('Laghubitta', $str);
    }

    public function testDigitalWallet(): void
    {
        $str = $this->faker->digitalWallet();
        self::assertIsString($str);
    }

    public function testSwiftCode(): void
    {
        $str = $this->faker->swiftCode();
        self::assertIsString($str);
    }

    public function testBankAccountNumber(): void
    {
        $str = $this->faker->bankAccountNumber();
        self::assertIsString($str);
        self::assertGreaterThanOrEqual(9, strlen($str));
        self::assertLessThanOrEqual(20, strlen($str));
    }

    protected function getProviders(): iterable
    {
        yield new Payment($this->faker);
    }
}
