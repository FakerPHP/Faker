<?php

namespace Faker\Test\Provider\ru_RU;

use Faker\Generator;
use Faker\Provider\ru_RU\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testLastNameForFemale(): void
    {
        self::assertEquals('а', substr($this->faker->lastName('female'), -2, 2));
    }

    public function testLastNameForMale(): void
    {
        self::assertNotEquals('а', substr($this->faker->lastName('male'), -2, 2));
    }

    public function testLastNameRandom(): void
    {
        self::assertNotNull($this->faker->lastName());
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }

    /**
     * @requires PHP < 8.3
     *
     * @dataProvider dataLastNameMale
     */
    public function testLastNameMale(int $seed, string $expected): void
    {
        $generator = new Generator();
        $generator->seed($seed);

        $provider = new Person($generator);

        self::assertSame($expected, $provider->lastNameMale());
    }

    public function dataLastNameMale(): iterable
    {
        yield 'seed: 4' => [
            4,
            'Морозов',
        ];

        yield 'seed: 8' => [
            8,
            'Гусев',
        ];

        yield 'seed: 15' => [
            15,
            'Алексеев',
        ];

        yield 'seed: 16' => [
            16,
            'Фадеев',
        ];

        yield 'seed: 23' => [
            23,
            'Воронов',
        ];

        yield 'seed: 42' => [
            42,
            'Горбачёв',
        ];
    }

    /**
     * @requires PHP < 8.3
     *
     * @dataProvider dataLastNameFemale
     */
    public function testLastNameFemale(int $seed, string $expected): void
    {
        $generator = new Generator();
        $generator->seed($seed);

        $provider = new Person($generator);

        self::assertSame($expected, $provider->lastNameFemale());
    }

    public function dataLastNameFemale(): iterable
    {
        yield 'seed: 4' => [
            4,
            'Морозова',
        ];

        yield 'seed: 8' => [
            8,
            'Гусева',
        ];

        yield 'seed: 15' => [
            15,
            'Алексеева',
        ];

        yield 'seed: 16' => [
            16,
            'Фадеева',
        ];

        yield 'seed: 23' => [
            23,
            'Воронова',
        ];

        yield 'seed: 42' => [
            42,
            'Горбачёва',
        ];
    }

    /**
     * Issue 832
     *
     * @requires PHP < 8.3
     *
     * @dataProvider dataFemaleSurnameWithoutDoubleALetter
     */
    public function testFemaleSurnameWithoutDoubleALetter(int $seed, string $expected): void
    {
        $generator = new Generator();
        $generator->seed($seed);

        foreach ($this->getProviders() as $provider) {
            $generator->addProvider($provider);
        }

        self::assertSame($expected, $generator->name('female'));
    }

    public static function dataFemaleSurnameWithoutDoubleALetter(): iterable
    {
        //bad cases
        yield 'seed: 55' => [
            55,
            'Ларионова Алиса Александровна',
        ];

        yield 'seed: 512' => [
            512,
            'Тихонова Галина Андреевна',
        ];

        yield 'seed: 625' => [
            625,
            'Ларионова Изабелла Романовна',
        ];

        yield 'seed: 1917' => [
            1917,
            'Павлова Владлена Романовна',
        ];
    }
}
