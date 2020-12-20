<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\en_GB;

use Faker\Provider\en_GB\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testNationalInsuranceNumber()
    {
        $result = $this->faker->nino;

        self::assertMatchesRegularExpression('/^[A-Z]{2}\d{6}[A-Z]{1}$/', $result);

        self::assertNotContains($result[0], ['D', 'F', 'I', 'Q', 'U', 'V']);
        self::assertNotContains($result[1], ['D', 'F', 'I', 'Q', 'U', 'V']);
        self::assertNotContains($result, ['BG', 'GB', 'NK', 'KN', 'TN', 'NT', 'ZZ']);
        self::assertNotSame('O', $result[1]);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
