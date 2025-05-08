<?php

declare(strict_types=1);

namespace Faker\Test\Provider\sv_SE;

use Faker\Calculator\Luhn;
use Faker\Provider\sv_SE\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function provideSeedAndExpectedReturn()
    {
        return [
            [1, '19720727', false, '720727-5798'],
            [2, '19710414', false, '710414-5664'],
            [3, '19591012', false, '591012-4519'],
            [4, '20180307', false, '180307-0356'],
            [5, '19820904', false, '820904-7748'],
            [6, '19720727', true, '19720727-1010'],
            [7, '19710414', true, '19710414-9269'],
            [8, '19591012', true, '19591012-1290'],
            [9, '20180307', true, '20180307-9858'],
            [10, '19820904', true, '19820904-2334'],
        ];
    }

    /**
     * @dataProvider provideSeedAndExpectedReturn
     */
    public function testPersonalIdentityNumberUsesBirthDateIfProvided($seed, $birthdate, $withCentury, $expected): void
    {
        $faker = $this->faker;
        $faker->seed($seed);
        $pin = $faker->personalIdentityNumber(\DateTime::createFromFormat('Ymd', $birthdate), null, $withCentury);
        self::assertEquals($expected, $pin);
    }

    public function testPersonalIdentityNumberGeneratesLuhnCompliantNumbers(): void
    {
        $pin = str_replace('-', '', $this->faker->personalIdentityNumber());
        self::assertTrue(Luhn::isValid($pin));
    }

    public function testPersonalIdentityNumberGeneratesOddValuesForMales(): void
    {
        $pin = $this->faker->personalIdentityNumber(null, 'male');
        self::assertEquals(1, $pin[9] % 2);
    }

    public function testPersonalIdentityNumberGeneratesEvenValuesForFemales(): void
    {
        $pin = $this->faker->personalIdentityNumber(null, 'female');
        self::assertEquals(0, $pin[9] % 2);
    }

    public function testBirthNumberNot000(): void
    {
        $faker = $this->faker;
        $faker->seed(97270);
        $pin = $this->faker->personalIdentityNumber();

        self::assertNotEquals('000', substr($pin, 7, 3));
    }

    public function testBirthNumberGeneratesEvenValuesForFemales(): void
    {
        $faker = $this->faker;
        $faker->seed(372920);
        $pin = $this->faker->personalIdentityNumber(null, 'female');

        self::assertNotEquals('000', substr($pin, 7, 3));
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
