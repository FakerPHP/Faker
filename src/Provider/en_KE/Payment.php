<?php

namespace Faker\Provider\en_KE;

class Payment extends \Faker\Provider\Payment
{
    /**
     * Common Kenyan mobile money services.
     */
    protected static $mobileMoneyProviders = [
        'M-Pesa',
        'Airtel Money',
        'Equitel',
        'T-Kash',
        'Pesalink',
        'MCo-op Cash',
    ];

    /**
     * Common Kenyan bank names (select few).
     */
    protected static $banks = [
        'Equity Bank',
        'KCB Bank',
        'Co-operative Bank',
        'Absa Bank Kenya',
        'NCBA Bank',
        'Stanbic Bank',
        'DTB Kenya',
        'Family Bank',
        'I&M Bank',
    ];

    /**
     * M-Pesa Paybill numbers (random sample; real ones are longer).
     */
    protected static $paybillNumbers = [
        '247247', // M-Pesa Buy Goods & Services
        '522522', // Safaricom official paybill
        '400200', // Equity Bank
        '522522', // KCB M-Pesa
        '222111', // eCitizen
        '303030', // HELB
        '201491', // Kenya Power
        '220220', // NHIF
    ];

    /**
     * Generate a mobile money provider name (e.g., "M-Pesa").
     */
    public static function mobileMoneyProvider(): string
    {
        return static::randomElement(static::$mobileMoneyProviders);
    }

    /**
     * Generate a random Kenyan Paybill number.
     */
    public static function paybillNumber(): string
    {
        return static::randomElement(static::$paybillNumbers);
    }

    /**
     * Generate a realistic mobile money transaction code.
     * (Format example: QFT6H28OP1 – similar to M-Pesa)
     */
    public static function transactionCode(): string
    {
        return strtoupper(
            static::bothify('??#?##??##')
        );
    }


    /**
     * Generate a random Kenyan bank name.
     */
    public static function bank(): string
    {
        return static::randomElement(static::$banks);
    }

    /**
     * Generate a pseudo bank account number (Kenyan format).
     */
    public static function bankAccountNumber(): string
    {
        return static::numerify('01##########');
    }

    /**
     * Generate a random mobile number formatted as used in mobile money.
     */
    public static function mobileMoneyNumber(): string
    {
        return static::numerify('07########');
    }

    /**
     * Generate a mobile money statement entry.
     */
    public static function mobileMoneyStatement(): array
    {
        return [
            'provider' => static::mobileMoneyProvider(),
            'number' => static::mobileMoneyNumber(),
            'transaction_code' => static::transactionCode(),
            'amount' => static::randomFloat(2, 10, 10000),
            'paybill' => static::paybillNumber(),
            'date' => date('Y-m-d H:i:s', time()),
        ];
    }
}
