<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ru_RU;

use Faker\Provider\ru_RU\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testLastNameFemale(): void
    {
        self::assertEquals('а', substr($this->faker->lastName('female'), -2, 2));
    }

    public function testLastNameMale(): void
    {
        self::assertNotEquals('а', substr($this->faker->lastName('male'), -2, 2));
    }

    public function testLastNameRandom(): void
    {
        self::assertNotNull($this->faker->lastName());
    }

    public function testINN(): void
    {
        self::assertMatchesRegularExpression('/^[0-9]{12}$/', $this->faker->inn12);
        self::assertEquals('77', substr($this->faker->inn12('77'), 0, 2));
        self::assertEquals('02', substr($this->faker->inn12(2), 0, 2));
    }

    public function checksumProvider()
    {
        return [
            ['6478744544', '36'],
            ['5399119774', '63'],
            ['1803813512', '88'],
            ['2279194999', '80'],
            ['8295678753', '19'],
        ];
    }

    /**
     * @dataProvider checksumProvider
     */
    public function testInn12Checksum($inn12, $checksum): void
    {
        self::assertSame($checksum, $this->faker->inn12Checksum($inn12), $inn12);
    }

    public function inn12ValidatorProvider()
    {
        return [
            ['647874454436', true],
            ['425577567121', true],
            ['500100732259', true],
            ['829567875319', true],
            ['111111111111', false],
            ['012345678901', false],
        ];
    }

    /**
     * @dataProvider inn12ValidatorProvider
     */
    public function testInn12IsValid($inn12, $isValid): void
    {
        self::assertSame($isValid, $this->faker->inn12IsValid($inn12), $inn12);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
