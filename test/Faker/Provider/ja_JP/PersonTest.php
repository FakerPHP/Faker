<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\ja_JP;

use Faker\Provider\ja_JP\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testKanaNameMaleReturns()
    {
        self::assertEquals('アオタ ミノル', $this->faker->kanaName('male'));
    }

    public function testKanaNameFemaleReturns()
    {
        self::assertEquals('アオタ ミキ', $this->faker->kanaName('female'));
    }

    public function testFirstKanaNameMaleReturns()
    {
        self::assertEquals('ヒデキ', $this->faker->firstKanaName('male'));
    }

    public function testFirstKanaNameFemaleReturns()
    {
        self::assertEquals('マアヤ', $this->faker->firstKanaName('female'));
    }

    public function testLastKanaNameReturnsNakajima()
    {
        self::assertEquals('ナカジマ', $this->faker->lastKanaName);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
