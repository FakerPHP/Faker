<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ru_RU;

use Faker\Provider\ru_RU\Payment;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PaymentTest extends TestCase
{
    public function testBankNamesContainNoMarkupLeftovers(): void
    {
        foreach ($this->banks() as $bank) {
            self::assertDoesNotMatchRegularExpression('/&[a-z]+;/i', $bank);
            self::assertDoesNotMatchRegularExpression('/ {2,}/', $bank);
            self::assertSame(trim($bank), $bank);
        }
    }

    public function testBankNamesAreCyrillicOutsideParentheses(): void
    {
        foreach ($this->banks() as $bank) {
            self::assertDoesNotMatchRegularExpression(
                '/[A-Za-z]/',
                preg_replace('/\([^)]*\)/', '', $bank),
                $bank,
            );
        }
    }

    /**
     * @return array<int, string>
     */
    private function banks(): array
    {
        return (new \ReflectionClass(Payment::class))->getStaticPropertyValue('banks');
    }

    protected function getProviders(): iterable
    {
        yield new Payment($this->faker);
    }
}
