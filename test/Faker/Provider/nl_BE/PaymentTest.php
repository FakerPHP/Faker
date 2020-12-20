<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\nl_BE;

use Faker\Provider\nl_BE\Payment;
use Faker\Test\TestCase;

final class PaymentTest extends TestCase
{
    public function testVatIsValid()
    {
        $vat = $this->faker->vat();
        $unspacedVat = $this->faker->vat(false);
        self::assertMatchesRegularExpression('/^(BE 0\d{9})$/', $vat);
        self::assertMatchesRegularExpression('/^(BE0\d{9})$/', $unspacedVat);
    }

    protected function getProviders(): iterable
    {
        yield new Payment($this->faker);
    }
}
