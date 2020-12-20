<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\sv_SE;

use Faker\Calculator\Luhn;
use Faker\Provider\sv_SE\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function provideSeedAndExpectedReturn()
    {
        return [
            [1, '720727', '720727-5798'],
            [2, '710414', '710414-5664'],
            [3, '591012', '591012-4519'],
            [4, '180307', '180307-0356'],
            [5, '820904', '820904-7748']
        ];
    }

    /**
     * @dataProvider provideSeedAndExpectedReturn
     */
    public function testPersonalIdentityNumberUsesBirthDateIfProvided($seed, $birthdate, $expected)
    {
        $faker = $this->faker;
        $faker->seed($seed);
        $pin = $faker->personalIdentityNumber(\DateTime::createFromFormat('ymd', $birthdate));
        self::assertEquals($expected, $pin);
    }

    public function testPersonalIdentityNumberGeneratesLuhnCompliantNumbers()
    {
        $pin = str_replace('-', '', $this->faker->personalIdentityNumber());
        self::assertTrue(Luhn::isValid($pin));
    }

    public function testPersonalIdentityNumberGeneratesOddValuesForMales()
    {
        $pin = $this->faker->personalIdentityNumber(null, 'male');
        self::assertEquals(1, $pin[9] % 2);
    }

    public function testPersonalIdentityNumberGeneratesEvenValuesForFemales()
    {
        $pin = $this->faker->personalIdentityNumber(null, 'female');
        self::assertEquals(0, $pin[9] % 2);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
