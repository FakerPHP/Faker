<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider;

use Faker\Provider\Medical;
use Faker\Test\TestCase;

final class MedicalTest extends TestCase
{
    public function testBloodType(): void
    {
        self::assertContains($this->faker->bloodType, ['A', 'AB', 'B', 'O']);
    }

    public function testBloodRh(): void
    {
        self::assertContains($this->faker->bloodRh, ['+', '-']);
    }

    public function testBloodGroup(): void
    {
        self::assertContains($this->faker->bloodGroup, ['A+', 'A-', 'AB+', 'AB-', 'B+', 'B-', 'O+', 'O-']);
    }

    protected function getProviders(): iterable
    {
        yield new Medical($this->faker);
    }
}
