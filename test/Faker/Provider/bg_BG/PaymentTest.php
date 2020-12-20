<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\bg_BG;

use Faker\Provider\bg_BG\Payment;
use Faker\Test\TestCase;

final class PaymentTest extends TestCase
{
    public function testVatIsValid()
    {
        $vat = $this->faker->vat();
        $unspacedVat = $this->faker->vat(false);
        self::assertMatchesRegularExpression('/^(BG \d{9,10})$/', $vat);
        self::assertMatchesRegularExpression('/^(BG\d{9,10})$/', $unspacedVat);
    }

    protected function getProviders(): iterable
    {
        yield new Payment($this->faker);
    }
}
