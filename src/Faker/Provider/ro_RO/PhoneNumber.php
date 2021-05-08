<?php

namespace Faker\Provider\ro_RO;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $normalFormats = [
        'landline' => [
            '021#######', // Bucharest
            '023#######',
            '024#######',
            '025#######',
            '026#######',
            '027#######', // non-geographic
            '031#######', // Bucharest
            '033#######',
            '034#######',
            '035#######',
            '036#######',
            '037#######', // non-geographic
        ],
        'mobile' => [ // https://github.com/google/libphonenumber/blob/7e9612a9112d498b61e5453538c4b0953969b46a/javascript/i18n/phonenumbers/metadatalite.js#L6212
            '7020#####',
            '7120#####',
            '700######',
            '701######',
            '703######',
            '704######',
            '705######',
            '706######',
            '707######',
            '708######',
            '709######',
            '710######',
            '711######',
            '72#######',
            '73#######',
            '74#######',
            '75#######',
            '76#######',
            '77#######',
            '780######',
            '783######',
            '784######',
            '785######',
            '786######',
            '787######',
            '788######',
            '790######',
            '799######',
        ],
    ];

    protected static $specialFormats = [
        'toll-free' => [
            '0800######',
            '0801######', // shared-cost numbers
            '0802######', // personal numbering
            '0806######', // virtual cards
            '0807######', // pre-paid cards
            '0870######', // internet dial-up
        ],
        'premium-rate' => [
            '0900######',
            '0903######', // financial information
            '0906######', // adult entertainment
        ],
    ];

    /**
     * @see http://en.wikipedia.org/wiki/Telephone_numbers_in_Romania#Last_years
     */
    public function phoneNumber()
    {
        $type = static::randomElement(array_keys(static::$normalFormats));

        return static::numerify(static::randomElement(static::$normalFormats[$type]));
    }

    public static function tollFreePhoneNumber()
    {
        return static::numerify(static::randomElement(static::$specialFormats['toll-free']));
    }

    public static function premiumRatePhoneNumber()
    {
        return static::numerify(static::randomElement(static::$specialFormats['premium-rate']));
    }
}
