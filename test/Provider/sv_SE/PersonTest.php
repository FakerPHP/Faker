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
            [1, '720727', '720727-8453'],
            [2, '710414', '710414-8486'],
            [3, '591012', '591012-9864'],
            [4, '180307', '180307-5306'],
            [5, '820904', '820904-4117'],
        ];
    }

    /**
     * @dataProvider provideSeedAndExpectedReturn
     */
    public function testPersonalIdentityNumberUsesBirthDateIfProvided($seed, $birthdate, $expected): void
    {
        $faker = $this->faker;
        $faker->seed($seed);
        $pin = $faker->personalIdentityNumber(\DateTime::createFromFormat('ymd', $birthdate));
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
