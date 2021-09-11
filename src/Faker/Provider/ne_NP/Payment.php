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
     * List of development banks sorted in alphabetical order.
     * @var string[]
     */
    protected static $developmentBanks = ['Corporate Development Bank', 'Excel Development Bank', 'Garima Bikas Bank', 'Green Development Bank', 'Jyoti Bikas Bank', 'Kamana Sewa Bikash Bank', 'Karnali Development Bank', 'Lumbini Bikas Bank', 'Mahalaxmi Bikas Bank', 'Miteri Development Bank', 'Muktinath  Bikas Bank', 'Narayani Development Bank', 'Nepal Infrastructure Bank', 'Sahara Bikas Bank', 'Salapa Bikas Bank', 'Saptakoshi Development Bank', 'Shangrila Development Bank', 'Shine Resunga Development Bank', 'Sindhu Bikas Bank'];

    /**
     * List of finance companies sorted in alphabetical order.
     * @var string[]
     */
    protected static $financeCompanies = ['Best Finance Company', 'Capital Merchant Banking & Finance', 'Central Finance', 'Goodwill Finance Company', 'Guheshwori Merchant Banking & Finance', 'Gurkhas Finance', 'ICFC Finance', 'Janaki Finance Company', 'Manjushree Finance', 'Multipurpose Finance Company', 'Nepal Finance', 'Nepal Share Markets', 'Pokhara Finance', 'Progressive Finance', 'Reliance Finance', 'Samriddhi Finance Company', 'Shree Investment Finance Company'];

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
     * @example 'Nepal Infrastructure Bank'
     */
    public function developmentBank(): string
    {
        return static::randomElement(static::$developmentBanks);
    }

    /**
     * @return string
     * @example 'Gurkhas Finance'
     */
    public function financeCompany(): string
    {
        return static::randomElement(static::$financeCompanies);
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
