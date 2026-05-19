<?php

declare(strict_types=1);

namespace Faker\Test\Provider\pt_BR;

use Faker\Provider\pt_BR\Company;
use Faker\Test\TestCase;

use function Faker\Provider\pt_BR\check_digit_alpha;

/**
 * @group legacy
 */
final class CompanyTest extends TestCase
{
    public function testCnpjFormatIsValid(): void
    {
        $cnpj = $this->faker->cnpj(false);
        self::assertMatchesRegularExpression('/\d{8}\d{4}\d{2}/', $cnpj);
        $cnpj = $this->faker->cnpj(true);
        self::assertMatchesRegularExpression('/\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}/', $cnpj);
    }

    public function testCnpjAlphaFormatIsValid(): void
    {
        $cnpj = $this->faker->cnpjAlpha(false);
        self::assertMatchesRegularExpression('/^[A-Z0-9]{8}\d{4}\d{2}$/', $cnpj);

        $cnpj = $this->faker->cnpjAlpha(true);
        self::assertMatchesRegularExpression('/^[A-Z0-9]{2}\.[A-Z0-9]{3}\.[A-Z0-9]{3}\/\d{4}-\d{2}$/', $cnpj);
    }

    public function testCnpjAlphaCheckDigitsAreValid(): void
    {
        $cnpj = $this->faker->cnpjAlpha(false);

        self::assertSame((int) $cnpj[12], check_digit_alpha(substr($cnpj, 0, 12)));
        self::assertSame((int) $cnpj[13], check_digit_alpha(substr($cnpj, 0, 13)));
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
