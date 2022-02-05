<?php

namespace Faker\Provider\ar_DZ;

class Payment extends \Faker\Provider\Payment
{
    /**
     * International Bank Account Number (IBAN)
     *
     * @see http://randomiban.com/?country=Algeria
     */
    public function bankAccountNumber(): string
    {
        return self::iban('DZ', '', 25);
    }
}
