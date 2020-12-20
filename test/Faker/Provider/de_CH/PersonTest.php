<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\de_CH;

use Faker\Calculator\Ean;
use Faker\Provider\de_CH\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testAvs13Number()
    {
        $avs = $this->faker->avs13;
        self::assertMatchesRegularExpression('/^756\.([0-9]{4})\.([0-9]{4})\.([0-9]{2})$/', $avs);
        self::assertTrue(Ean::isValid(str_replace('.', '', $avs)));
    }

    public function testAhv13Number()
    {
        $ahv = $this->faker->ahv13;
        self::assertMatchesRegularExpression('/^756\.([0-9]{4})\.([0-9]{4})\.([0-9]{2})$/', $ahv);
        self::assertTrue(Ean::isValid(str_replace('.', '', $ahv)));
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
