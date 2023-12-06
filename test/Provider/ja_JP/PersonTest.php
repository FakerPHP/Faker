<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ja_JP;

use Faker\Provider\ja_JP\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testKanaNameMaleReturns(): void
    {
        self::assertEquals('ミヤケ ヤスヒロ', $this->faker->kanaName('male'));
    }

    public function testKanaNameFemaleReturns(): void
    {
        self::assertEquals('ミヤケ ユミコ', $this->faker->kanaName('female'));
    }

    public function testFirstKanaNameMaleReturns(): void
    {
        self::assertEquals('ヨウイチ', $this->faker->firstKanaName('male'));
    }

    public function testFirstKanaNameFemaleReturns(): void
    {
        self::assertEquals('チヨ', $this->faker->firstKanaName('female'));
    }

    public function testLastKanaNameReturnsNakajima(): void
    {
        self::assertEquals('ヤマモト', $this->faker->lastKanaName);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
