<?php

namespace Faker\Provider\en_GB;

class Company extends \Faker\Provider\Company
{
    public const VAT_PREFIX = 'GB';
    public const VAT_TYPE_DEFAULT = 'vat';
    public const VAT_TYPE_BRANCH = 'branch';
    public const VAT_TYPE_GOVERNMENT = 'gov';
    public const VAT_TYPE_HEALTH_AUTHORITY = 'health';

    /**
     * UK VAT number
     *
     * @see https://en.wikipedia.org/wiki/VAT_identification_number#VAT_numbers_by_country
     */
    public static function vat(string $type = null): string
    {
        switch ($type) {
            /**
             * branch traders:
             * 12 digits (as for 9 digits, followed by a block of 3 digits)
             */
            case static::VAT_TYPE_BRANCH:
                return sprintf(
                    '%s%d %d %d %d',
                    static::VAT_PREFIX,
                    static::randomNumber(3, true),
                    static::randomNumber(4, true),
                    static::randomNumber(2, true),
                    static::randomNumber(3, true)
                );
            /**
             * government departments:
             * the letters GD then 3 digits from 000 to 499 (e.g. GBGD001)
             */
            case static::VAT_TYPE_GOVERNMENT:
                return sprintf(
                    '%sGD%s',
                    static::VAT_PREFIX,
                    str_pad(static::numberBetween(0, 499), 3, '0', STR_PAD_LEFT)
                );
            /**
             * health authorities:
             * the letters HA then 3 digits from 500 to 999 (e.g. GBHA599)
             */
            case static::VAT_TYPE_HEALTH_AUTHORITY:
                return sprintf(
                    '%sHA%d',
                    static::VAT_PREFIX,
                    static::numberBetween(500, 999)
                );
            /**
             * standard:
             * 9 digits (block of 3, block of 4, block of 2)
             */
            default:
                return sprintf(
                    '%s%d %d %d',
                    static::VAT_PREFIX,
                    static::randomNumber(3, true),
                    static::randomNumber(4, true),
                    static::randomNumber(2, true)
                );
        }
    }
}
