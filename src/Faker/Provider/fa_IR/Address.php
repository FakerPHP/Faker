<?php

namespace Faker\Provider\fa_IR;

class Address extends \Faker\Provider\Address
{
    protected static $cityPrefix = ['استان'];
    protected static $streetPrefix = ['خیابان'];
    protected static $buildingNamePrefix = ['ساختمان'];
    protected static $buildingNumberPrefix = ['پلاک', 'قطعه'];
    protected static $postcodePrefix = ['کد پستی'];

    protected static $cityName = [
        'آذربایجان شرقی', 'آذربایجان غربی', 'اردبیل', 'اصفهان', 'البرز', 'ایلام', 'بوشهر',
        'تهران', 'خراسان جنوبی', 'خراسان رضوی', 'خراسان شمالی', 'خوزستان', 'زنجان', 'سمنان',
        'سیستان و بلوچستان', 'فارس', 'قزوین', 'قم', 'لرستان', 'مازندران', 'مرکزی', 'هرمزگان',
        'همدان', 'چهارمحال و بختیاری', 'کردستان', 'کرمان', 'کرمانشاه', 'کهگیلویه و بویراحمد',
        'گلستان', 'گیلان', 'یزد',
    ];

    protected static $cityFormats = [
        '{{cityName}}',
        '{{cityPrefix}} {{cityName}}',
    ];
    protected static $streetNameFormats = [
        '{{streetPrefix}} {{lastName}}',
    ];
    protected static $streetAddressFormats = [
        '{{streetName}} {{building}}',
    ];
    protected static $addressFormats = [
        '{{city}} {{streetAddress}} {{postcodePrefix}} {{postcode}}',
        '{{city}} {{streetAddress}}',
    ];
    protected static $buildingFormat = [
        '{{buildingNamePrefix}} {{firstName}} {{buildingNumberPrefix}} {{buildingNumber}}',
        '{{buildingNamePrefix}} {{firstName}}',
    ];

    protected static $postcode = ['##########'];

    /**
     * @var array Country names in Persian
     *
     * @see https://fa.wikipedia.org/wiki/%D9%81%D9%87%D8%B1%D8%B3%D8%AA_%DA%A9%D8%B4%D9%88%D8%B1%D9%87%D8%A7%DB%8C_%D9%85%D8%B3%D8%AA%D9%82%D9%84
     */
    protected static $country = [
        'آبخاز', 'آرژانتین', 'آفریقای جنوبی', 'آلبانی', 'آلمان', 'آنتیگوا و باربودا', 'آندورا', 'آنگولا',
        'اتریش', 'اتیوپی', 'اردن', 'ارمنستان', 'اروگوئه', 'اریتره', 'ازبکستان', 'استرالیا', 'استونی', 'اسرائیل', 'اسلواکی', 'اسلوونی', 'اسواتینی', 'اسپانیا', 'افغانستان', 'الجزایر', 'السالوادور', 'امارات متحده عربی', 'اندونزی', 'اوستیای جنوبی', 'اوکراین', 'اوگاندا', 'اکوادور', 'ایالات فدرال میکرونزی', 'ایالات متحده آمریکا', 'ایتالیا', 'ایران', 'ایسلند',
        'باربادوس', 'باهاما', 'بحرین', 'برزیل', 'برونئی', 'بریتانیا', 'بلاروس', 'بلغارستان', 'بلژیک', 'بلیز', 'بنگلادش', 'بنین', 'بوتسوانا', 'بوروندی', 'بورکینافاسو', 'بوسنی و هرزگوین', 'بولیوی',
        'تاجیکستان', 'تانزانیا', 'تایلند', 'ترانسنیستریا', 'ترکمنستان', 'ترکیه', 'ترینیداد و توباگو', 'تونس', 'تونگا', 'تووالو', 'توگو', 'تیمور شرقی',
        'جامائیکا', 'جزایر سلیمان', 'جزایر مارشال', 'جزایر کوک', 'جمهوری آذربایجان', 'جمهوری آرتساخ', 'جمهوری آفریقای مرکزی', 'جمهوری اکوادور',  'جمهوری ایرلند', 'جمهوری دموکراتیک صحرای غربی', 'جمهوری دموکراتیک کنگو', 'جمهوری دومینیکن', 'جمهوری چک', 'جمهوری چین', 'جمهوری کنگو', 'جیبوتی',
        'دانمارک', 'دماغه سبز', 'دومینیکا',
        'رواندا', 'روسیه', 'رومانی', 'زامبیا',
        'زیمبابوه', 'سائوتومه و پرنسیپ',
        'ساحل عاج', 'ساموآ', 'سان مارینو', 'سری‌لانکا', 'سنت لوسیا', 'سنت وینسنت و گرنادین‌ها', 'سنت کیتس و نویس', 'سنگال', 'سنگاپور', 'سوئد', 'سوئیس', 'سودان', 'سودان جنوبی', 'سورینام', 'سوریه', 'سومالی', 'سومالی‌لند', 'سیرالئون', 'سیشل',
        'شیلی',
        'صربستان',
        'عراق', 'عربستان سعودی', 'عمان',
        'غنا',
        'فرانسه', 'فلسطین', 'فنلاند', 'فیجی', 'فیلیپین',
        'قبرس', 'قبرس شمالی', 'قرقیزستان', 'قزاقستان', 'قطر',
        'لائوس', 'لبنان', 'لتونی', 'لسوتو', 'لهستان', 'لوکزامبورگ', 'لیبریا', 'لیبی', 'لیتوانی', 'لیختن‌اشتاین',
        'ماداگاسکار', 'مالاوی', 'مالت', 'مالدیو', 'مالزی', 'مالی', 'مجارستان', 'مراکش', 'مصر', 'مغولستان', 'مقدونیه شمالی', 'موریتانی', 'موریس', 'موزامبیک', 'مولداوی', 'موناکو', 'مونته‌نگرو', 'مکزیک', 'میانمار',
        'نائورو', 'نامیبیا', 'نروژ', 'نپال', 'نیجر', 'نیجریه', 'نیوزیلند', 'نیووی', 'نیکاراگوئه',
        'هائیتی', 'هلند', 'هند', 'هندوراس',
        'واتیکان', 'وانواتو', 'ونزوئلا', 'ویتنام',
        'پادشاهی بوتان', 'پاراگوئه', 'پالائو', 'پاناما', 'پاپوآ گینه نو', 'پاکستان', 'پرتغال', 'پرو',
        'چاد', 'چین',
        'ژاپن',
        'کاستاریکا', 'کامبوج', 'کامرون', 'کانادا', 'کره جنوبی', 'کره شمالی', 'کرواسی', 'کلمبیا', 'کنیا', 'کوبا', 'کوزوو', 'کومور', 'کویت', 'کیریباتی',
        'گابن', 'گامبیا', 'گرجستان', 'گرنادا', 'گواتمالا', 'گویان', 'گینه', 'گینه استوایی', 'گینه بیسائو',
        'یمن', 'یونان',
    ];

    /**
     * @example 'استان'
     */
    public static function cityPrefix()
    {
        return static::randomElement(static::$cityPrefix);
    }

    /**
     * @example 'زنجان'
     */
    public static function cityName()
    {
        return static::randomElement(static::$cityName);
    }

    /**
     * @example 'خیابان'
     */
    public static function streetPrefix()
    {
        return static::randomElement(static::$streetPrefix);
    }

    /**
     * @example 'ساختمان'
     */
    public static function buildingNamePrefix()
    {
        return static::randomElement(static::$buildingNamePrefix);
    }

    /**
     * @example 'پلاک'
     */
    public static function buildingNumberPrefix()
    {
        return static::randomElement(static::$buildingNumberPrefix);
    }

    /**
     * @example 'ساختمان آفتاب پلاک 24'
     */
    public function building()
    {
        $format = static::randomElement(static::$buildingFormat);

        return $this->generator->parse($format);
    }

    /**
     * @example 'کد پستی'
     */
    public static function postcodePrefix()
    {
        return static::randomElement(static::$postcodePrefix);
    }
}
