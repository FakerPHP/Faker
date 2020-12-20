<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\fr_FR;

use Faker\Provider\fr_FR\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testNIRReturnsTheRightGender()
    {
        $nir = $this->faker->nir(\Faker\Provider\Person::GENDER_MALE);
        self::assertStringStartsWith('1', $nir);
    }

    public function testNIRReturnsTheRightPattern()
    {
        $nir = $this->faker->nir;
        self::assertMatchesRegularExpression("/^[12]\d{5}[0-9A-B]\d{8}$/", $nir);
    }

    public function testNIRFormattedReturnsTheRightPattern()
    {
        $nir = $this->faker->nir(null, true);
        self::assertMatchesRegularExpression("/^[12]\s\d{2}\s\d{2}\s\d{1}[0-9A-B]\s\d{3}\s\d{3}\s\d{2}$/", $nir);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
