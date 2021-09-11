<?php

namespace Faker\Provider\ne_NP;

class Payment extends \Faker\Provider\Payment
{
    /**
     * List of commercial banks sorted in alphabetical order.
     * @var string[]
     */
    protected static $commercialBanks = ['Agricultural Development Bank', 'Bank Of Kathmandu', 'Century Commercial Bank', 'Citizens Bank International', 'Civil Bank', 'Everest Bank', 'Global IME Bank', 'Himalayan Bank', 'Kumari Bank', 'Laxmi Bank', 'Machhapuchchhre Bank', 'Mega Bank Nepal', 'Nabil Bank', 'Nepal Bangladesh Bank', 'Nepal Bank', 'Nepal Credit & Commerce Bank', 'Nepal Investment Bank', 'Nepal SBI Bank', 'NIC ASIA Bank', 'NMB Bank', 'Prabhu Bank', 'Prime Commercial Bank', 'Rastriya Banijya Bank', 'Sanima Bank', 'Siddhartha Bank', 'Standard Chartered Bank Nepal', 'Sunrise Bank'];

    /**
     * List of digital wallets sorted in alphabetical order.
     * @var string[]
     */
    protected static $digitalWallets = ['CellPay', 'CGPay', 'dPaisa', 'EnetPay', 'eSewa', 'iCash', 'IME Pay', 'Khalti', 'MoRu', 'PayWell', 'PrabhuPAY', 'QPay'];

    /**
     * @return string
     * @example 'Agricultural Development Bank'
     */
    public function commercialBank(): string
    {
        return static::randomElement(static::$commercialBanks);
    }

    /**
     * @return string
     * @example 'Khalti'
     */
    public function digitalWallet(): string
    {
        return static::randomElement(static::$digitalWallets);
    }
}
