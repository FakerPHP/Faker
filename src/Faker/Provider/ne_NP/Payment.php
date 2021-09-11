<?php

namespace Faker\Provider\ne_NP;

class Payment extends \Faker\Provider\Payment
{
    /**
     * List of Popular digital wallet providers in Nepal sorted in Alphabetical order.
     * @var string[]
     */
    protected static $walletProviders = ['CellPay', 'CGPay', 'dPaisa', 'EnetPay', 'eSewa', 'iCash', 'IME Pay', 'Khalti', 'MoRu', 'PayWell', 'PrabhuPAY', 'QPay'];

    /**
     * @return string
     * @example 'Khalti'
     */
    public function walletProvider(): string
    {
        return static::randomElement(static::$walletProviders);
    }
}
