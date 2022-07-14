<?php

namespace Faker\Provider\ar_EG;

use Faker\Calculator\Luhn;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{companyPrefix}} {{cityName}}',
        '{{companyPrefix}} {{lastName}}',
        '{{cityName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{companyPrefix}} {{lastName}} {{companySuffix}}',
        '{{companyPrefix}} {{cityName}} {{companySuffix}}',
    ];

    protected static $catchPhraseWords = [
        ['الخدمات', 'الحلول', 'الانظمة', 'الاستشارات'],
        [
            'الذهبية', 'الذكية', 'المتطورة', 'المتقدمة', 'الدولية', 'المتخصصه', 'السريعة',
            'المثلى', 'الابداعية', 'المتكاملة', 'المتغيرة', 'المثالية', 'الحديثة',
        ],
    ];

    protected static $companyPrefix = ['شركة', 'مؤسسة', 'مجموعة', 'مكتب', 'أكاديمية', 'مجمع', 'معرض'];

    protected static $companySuffix = [
        'الخاصة',
        'للتجاره العامه',
        'المحدودة',
        'للأجهزة الطبيه',
        'للتوريدات',
        'للمقاولات',
        'للتطوير العقاري',
        'للدعايه و الاعلان',
        'للحلول المتقدمه',
        'للخدمات الدولية',
        'الدولية',
        'للانظمة المتكاملة',
        'للنقل',
        'للسفريات',
        'للحماية',
        'للترميم',
        'للاتصالات',
        'للصيانة',
    ];

    /**
     * @example 'مؤسسة'
     *
     * @return string
     */
    public function companyPrefix()
    {
        return static::randomElement(self::$companyPrefix);
    }

    /**
     * @example 'الاستشارات الدولية'
     */
    public function catchPhrase()
    {
        $result = [];

        foreach (static::$catchPhraseWords as &$word) {
            $result[] = static::randomElement($word);
        }

        return implode(' ', $result);
    }

    /**
     * example 010101010
     */
    public static function companyTaxIdNumber()
    {
        $partialValue = static::numerify(str_repeat('#', 9));

        return Luhn::generateLuhnNumber($partialValue);
    }

    /**
     * example 010101
     */
    public static function companyTradeRegisterNumber()
    {
        $partialValue = static::numerify(str_repeat('#', 6));

        return Luhn::generateLuhnNumber($partialValue);
    }
}
