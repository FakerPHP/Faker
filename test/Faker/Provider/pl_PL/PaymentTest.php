<?php

namespace Faker\Test\Provider\pl_PL;

use Faker\Provider\pl_PL\Payment;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PaymentTest extends TestCase
{
    public function testBankNamesAreNotPaddedWithWhitespace(): void
    {
        $reflection = new \ReflectionClass(Payment::class);
        $banks = $reflection->getProperty('banks');
        $banks->setAccessible(true);

        foreach ($banks->getValue() as $bank) {
            self::assertSame(trim($bank), $bank, sprintf('Bank name "%s" is padded with whitespace', $bank));
        }
    }

    protected function getProviders(): iterable
    {
        yield new Payment($this->faker);
    }
}
