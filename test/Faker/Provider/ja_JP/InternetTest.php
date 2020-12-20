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

use Faker\Provider\ja_JP\Internet;
use Faker\Test\TestCase;

final class InternetTest extends TestCase
{
    public function testUserName()
    {
        self::assertEquals('akira72', $this->faker->userName);
    }

    public function testDomainName()
    {
        self::assertEquals('nakajima.com', $this->faker->domainName);
    }

    protected function getProviders(): iterable
    {
        yield new Internet($this->faker);
    }
}
