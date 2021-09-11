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
     * List of microfinance companies sorted in alphabetical order.
     * @var string[]
     */
    protected static $microFinances = ['Aatmanirbhar', 'Adarsha', 'Adhikhola', 'Arambha Chautari', 'Asha', 'Aviyan', 'BPW', 'Buddha Jyoti', 'Chhimek', 'Civil', 'CYC Nepal', 'Deprosc', 'Deurali', 'Dhaulagiri', 'First Microfinance', 'Forward Microfinance', 'Ganapati', 'Ghodighoda', 'Global IME', 'Grameen Bikas', 'Gurans', 'Infinity', 'Jalpa Samudayik', 'Janautthan Samudayik', 'Jeevan Bikas', 'Kalika', 'Khaptad', 'Kisan', 'Laxmi', 'Mahila', 'Mahuli', 'Manakamana Smart', 'Manushi', 'Meromicrofinance', 'Mirmire', 'Mithila', 'NADEP', 'National Microfinance', 'Naya Sarathi', 'Nepal Sewa', 'Nerude', 'NESDO Samriddha', 'NIC Asia', 'Nirdhan Utthan', 'NMB', 'Rastra Utthan', 'RMDC', 'RSDC', 'Sabaiko', 'Sadhana', 'Samaj', 'Samata Gharelu', 'Samudayik', 'Sana Kisan Bikas', 'Shrijanshil', 'Summit', 'Super', 'Support', 'Suryodaya', 'Swabalamban', 'Swabhiman', 'Swastik', 'Sworojagar', 'Unique Nepal', 'Unnati Sahakarya', 'Upakar', 'Vijaya', 'WEAN', 'Womi'];

    /**
     * List of digital wallets sorted in alphabetical order.
     * @var string[]
     */
    protected static $digitalWallets = ['CellPay', 'CG Pay', 'Chito Paisa', 'DigiPay', 'dPaisa', 'EnetPay', 'eSewa', 'Fonepay', 'GME Pay', 'iCash', 'IME Pay', 'Ipay', 'Khalti', 'Kurakani Pay', 'Lenden', 'Mobalet', 'MOCO', 'Mohar', 'Moru', 'N-Cash', 'Namaste Pay', 'PayTime', 'PayWell', 'PrabhuPAY', 'QPay', 'SajiloPay', 'WePay'];

    /**
     * List of Swift Codes in alphabetical order.
     * @link https://www.theswiftcodes.com/nepal/
     * @var string[]
     */
    protected static $swiftCodes = ['ADBLNPKA', 'BOKLNPKA', 'CCBNNPKA', 'CIVLNPKA', 'CTZNNPKA', 'EVBLNPKA', 'GLBBNPKA', 'HIMANPKA', 'KMBLNPKA', 'LXBLNPKA', 'MBLNNPKA', 'MBNLNPKA', 'NARBNPKA', 'NBOCNPKA', 'NBOCNPKANRD', 'NEBLNPKA', 'NIBLNPKT', 'NICENPKA', 'NMBBNPKA', 'NPBBNPKA', 'NRBLNPKA', 'NRBLNPKAFED', 'NSBINPKA', 'NSBINPKA001', 'PCBLNPKA', 'PRVUNPKA', 'RBBANPKA', 'SCBLNPKA', 'SIDDNPKA', 'SNMANPKA', 'SRBLNPKA'];

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
     * @example 'Adarsha Laghubitta Bittiya Sanstha'
     */
    public function microFinance(): string
    {
        $suffix = ' Laghubitta Bittiya Sanstha';
        return static::randomElement(static::$microFinances) . $suffix;
    }

    /**
     * @return string
     * @example 'Khalti'
     */
    public function digitalWallet(): string
    {
        return static::randomElement(static::$digitalWallets);
    }

    /**
     * @return string
     * @example 'ADBLNPKA'
     */
    public function swiftCode(): string
    {
        return static::randomElement(static::$swiftCodes);
    }

    /**
     * @return string
     */
    public function bankAccountNumber(): string
    {
        $prefixType = self::randomElement(['alpha', 'zero']);
        $length = $prefixType === 'alpha' ? self::numberBetween(8, 19) : self::numberBetween(7, 18);

        // format account
        $format = $prefixType === 'alpha' ? '[A-Z]' : '00';
        return self::regexify(sprintf('%s[1-9]{%d}', $format, $length));
    }
}
