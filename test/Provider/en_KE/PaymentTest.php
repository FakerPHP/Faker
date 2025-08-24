<?php

declare(strict_types=1);

namespace Faker\Provider\en_KE;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PaymentTest extends TestCase
{
    public function testMobileMoneyProviderIsValid(): void
    {
        $provider = Payment::mobileMoneyProvider();

        $providers = (new \ReflectionClass(Payment::class))->getStaticPropertyValue('mobileMoneyProviders');

        self::assertContains($provider, $providers);
    }

    public function testPaybillNumberIsValid(): void
    {
        $paybill = Payment::paybillNumber();

        $paybills = (new \ReflectionClass(Payment::class))->getStaticPropertyValue('paybillNumbers');

        self::assertContains($paybill, $paybills);
    }

    public function testTransactionCodeFormat(): void
    {
        $code = Payment::transactionCode();

        self::assertMatchesRegularExpression('/^[A-Z]{2}\d[A-Z]\d{2}[A-Z]{2}\d{2}$/', $code);
        self::assertEquals(10, strlen($code));
    }

    public function testBankIsValid(): void
    {
        $bank = Payment::bank();

        $banks = (new \ReflectionClass(Payment::class))->getStaticPropertyValue('banks');

        self::assertContains($bank, $banks);
    }

    public function testBankAccountNumberFormat(): void
    {
        $accountNumber = Payment::bankAccountNumber();

        self::assertMatchesRegularExpression('/^01\d{10}$/', $accountNumber);
        self::assertEquals(12, strlen($accountNumber));
    }

    public function testMobileMoneyNumberFormat(): void
    {
        $mobileNumber = Payment::mobileMoneyNumber();

        self::assertMatchesRegularExpression('/^07\d{8}$/', $mobileNumber);
        self::assertEquals(10, strlen($mobileNumber));
    }

    public function testMobileMoneyStatementStructure(): void
    {
        $statement = Payment::mobileMoneyStatement();

        self::assertIsArray($statement);
        self::assertArrayHasKey('provider', $statement);
        self::assertArrayHasKey('number', $statement);
        self::assertArrayHasKey('transaction_code', $statement);
        self::assertArrayHasKey('amount', $statement);
        self::assertArrayHasKey('paybill', $statement);
        self::assertArrayHasKey('date', $statement);

        $this->assertContains($statement['provider'], (new \ReflectionClass(Payment::class))->getStaticPropertyValue('mobileMoneyProviders'));
        self::assertMatchesRegularExpression('/^07\d{8}$/', $statement['number']);
        self::assertMatchesRegularExpression('/^[A-Z]{2}\d[A-Z]\d{2}[A-Z]{2}\d{2}$/', $statement['transaction_code']);
        self::assertIsFloat($statement['amount']);
        self::assertContains($statement['paybill'], (new \ReflectionClass(Payment::class))->getStaticPropertyValue('paybillNumbers'));
        self::assertMatchesRegularExpression('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $statement['date']);
    }

    protected function getProviders(): iterable
    {
        yield new Payment($this->faker);
    }
}
