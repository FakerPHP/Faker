<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\tr_TR;

use Faker\Test\TestCase;

final class PaymentTest extends TestCase
{
    public function testBankAccountNumber()
    {
        $accNo = $this->faker->bankAccountNumber;
        self::assertSame(substr($accNo, 0, 2), 'TR');
        self::assertSame(26, strlen($accNo));
    }

    protected function getProviders(): iterable
    {
        yield new Payment($this->faker);
    }
}
