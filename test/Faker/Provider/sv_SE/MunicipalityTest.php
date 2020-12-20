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

use Faker\Provider\sv_SE\Municipality;
use Faker\Test\TestCase;

final class MunicipalityTest extends TestCase
{
    public function testGenerate()
    {
        self::assertNotEmpty($this->faker->municipality());
    }

    protected function getProviders(): iterable
    {
        yield new Municipality($this->faker);
    }
}
