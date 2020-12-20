<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\zh_TW;

/**
 * @deprecated Use {@link \Faker\Provider\Payment} instead
 * @see \Faker\Provider\Payment
 */
class Payment extends \Faker\Provider\Payment
{
    /**
     * @return array
     * @deprecated Use {@link \Faker\Provider\Payment::creditCardDetails()} instead
     * @see \Faker\Provider\Payment::creditCardDetails()
     */
    public function creditCardDetails($valid = true)
    {
        return parent::creditCardDetails($valid);
    }
}
