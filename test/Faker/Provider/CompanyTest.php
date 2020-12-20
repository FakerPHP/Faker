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

use Faker\Provider\Company;
use Faker\Provider\Lorem;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    public function testJobTitle()
    {
        $jobTitle = $this->faker->jobTitle();
        $pattern = '/^[A-Za-z]+$/';
        self::assertMatchesRegularExpression($pattern, $jobTitle);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);

        yield new Lorem($this->faker);
    }
}
