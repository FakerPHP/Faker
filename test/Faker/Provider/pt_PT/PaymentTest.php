<?php

namespace Faker\Test\Provider\pt_PT;

use Faker\Calculator\Iban;
use Faker\Provider\pt_PT\Payment;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PaymentTest extends TestCase
{
    /**
     * @var string[] Valid Portuguese bank codes
     */
    private static $validBankCodes = [
        '0001', '0007', '0008', '0010', '0014', '0018', '0019', '0022', '0023', '0025',
        '0027', '0033', '0035', '0036', '0045', '0046', '0047', '0048', '0059', '0061',
        '0063', '0064', '0065', '0073', '0076', '0079', '0086', '0097', '0098', '0099',
        '0160', '0170', '0186', '0189', '0193', '0235', '0244', '0269', '0698', '0781',
        '5180', '5200', '5340', '8050',
    ];

    public function testIbanIsValid(): void
    {
        $iban = $this->faker->iban('PT');

        self::assertTrue(Iban::isValid($iban), "IBAN $iban should be valid");
    }

    public function testIbanHasCorrectLength(): void
    {
        $iban = $this->faker->iban('PT');

        self::assertSame(25, strlen($iban), "PT IBAN should be 25 characters long");
    }

    public function testIbanStartsWithPT(): void
    {
        $iban = $this->faker->iban('PT');

        self::assertStringStartsWith('PT', $iban);
    }

    public function testIbanUsesValidBankCode(): void
    {
        $iban = $this->faker->iban('PT');
        $bankCode = substr($iban, 4, 4);

        self::assertContains($bankCode, self::$validBankCodes, "Bank code $bankCode should be a valid Portuguese bank code");
    }

    public function testIbanNibCheckDigitsAreCorrect(): void
    {
        $iban = $this->faker->iban('PT');

        // Extract BBAN components
        $bankCode = substr($iban, 4, 4);
        $branchCode = substr($iban, 8, 4);
        $accountNumber = substr($iban, 12, 11);
        $nibCheckDigits = substr($iban, 23, 2);

        // Recalculate NIB check digits
        $nibWithoutCheck = $bankCode . $branchCode . $accountNumber;
        $expectedCheckDigits = 98 - Iban::mod97($nibWithoutCheck . '00');
        $expectedCheckDigits = str_pad((string) $expectedCheckDigits, 2, '0', STR_PAD_LEFT);

        self::assertSame($expectedCheckDigits, $nibCheckDigits, "NIB check digits should be correctly calculated");
    }

    public function testMultipleIbansAreAllValid(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $iban = $this->faker->iban('PT');
            self::assertTrue(Iban::isValid($iban), "IBAN $iban should be valid");
        }
    }

    protected function getProviders(): iterable
    {
        yield new Payment($this->faker);
    }
}
