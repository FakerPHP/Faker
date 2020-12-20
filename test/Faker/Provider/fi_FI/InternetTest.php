<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\fi_FI;

use Faker\Provider\fi_FI\Company;
use Faker\Provider\fi_FI\Internet;
use Faker\Provider\fi_FI\Person;
use Faker\Test\TestCase;

final class InternetTest extends TestCase
{
    public function testEmailIsValid()
    {
        $email = $this->faker->email();
        self::assertNotFalse(filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);

        yield new Internet($this->faker);

        yield new Company($this->faker);
    }
}
