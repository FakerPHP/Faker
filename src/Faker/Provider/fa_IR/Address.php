<?php

namespace Faker\Provider\fa_IR;

class Address extends \Faker\Provider\Address
{
    protected static $statePrefix = ['استان'];
    protected static $streetPrefix = ['خیابان'];
    protected static $buildingNamePrefix = ['ساختمان'];
    protected static $buildingNumberPrefix = ['پلاک', 'قطعه'];
    protected static $postcodePrefix = ['کد پستی'];

    protected static $stateName = [
        "آذربایجان شرقی", "آذربایجان غربی", "اردبیل", "اصفهان", "البرز", "ایلام", "بوشهر", "تهران",
        "چهارمحال و بختیاری", "خراسان جنوبی", "خراسان رضوی", "خراسان شمالی", "خوزستان", "زنجان", "سمنان", "سیستان و بلوچستان",
        "فارس", "قزوین", "قم", "کردستان", "کرمان", "کرمانشاه", "کهگیلویه و بویراحمد", "گلستان", "لرستان", "گیلان", "مازندران",
        "مرکزی", "هرمزگان", "همدان", "یزد"
    ];

    protected static $cityName = [
        "اسکو", "اهر", "ایلخچی", "آبش احمد", "آذرشهر", "آقکند", "باسمنج", "بخشایش", "بستان آباد", "بناب",
        "بناب جدید", "تبریز", "ترک", "ترکمانچای", "تسوج", "تیکمه داش", "جلفا", "خاروانا", "خامنه", "خراجو", "خسروشهر", "خضرلو", "خمارلو",
        "خواجه", "دوزدوزان", "زرنق", "زنوز", "سراب", "سردرود", "سهند", "سیس", "سیه رود", "شبستر", "شربیان", "شرفخانه", "شندآباد", "صوفیان",
        "عجب شیر", "قره آغاج", "کشکسرای", "کلوانق", "کلیبر", "کوزه کنان", "گوگان", "لیلان", "مراغه", "مرند", "ملکان", "ملک کیان", "ممقان",
        "مهربان", "میانه", "نظرکهریزی", "هادی شهر", "هرگلان", "هریس", "هشترود", "هوراند", "وایقان", "ورزقان", "یامچی", "ارومیه", "اشنویه",
    ];

    protected static $cityFormats = [
        '{{cityName}}',
    ];
    protected static $streetNameFormats = [
        '{{streetPrefix}} {{lastName}}',
    ];
    protected static $streetAddressFormats = [
        '{{city}} {{streetName}}',
    ];
    protected static $addressFormats = [
        '{{stateName}} - {{city}} - {{streetAddress}} - {{postcodePrefix}} {{postcode}}',
    ];

    protected static $buildingNumber = ['%#'];
    protected static $postcode = ['##########'];
    protected static $country = ['ایران'];

    /**
     * @example 'خیابان'
     *
     * @return string
     */
    public static function streetPrefix()
    {
        return static::randomElement(static::$streetPrefix);
    }

    /**
     * @example '791'
     *
     * @return string
     */
    public static function buildingNumber()
    {
        return static::numerify(static::randomElement(static::$buildingNumber));
    }

    /**
     * @example 'تبریز'
     *
     * @return string
     */
    public function city()
    {
        $format = static::randomElement(static::$cityFormats);
        return $this->generator->parse($format);
    }

    /**
     * @example 'گرگان'
     *
     * @return string
     */
    public function cityName()
    {
        $format = static::randomElement(static::$cityName);
        return $this->generator->parse($format);
    }

    /**
     * @example "کد پستی"
     * 
     * @return string
     */
    public function postcodePrefix()
    {
        $format = static::randomElement(static::$postcodePrefix);
        return $this->generator->parse($format);
    }

    /**
     * @example 'گیلان'
     * 
     * @return string
     */
    public function stateName()
    {
        $format = static::randomElement(static::$stateName);
        return $this->generator->parse($format);
    }

    /**
     * @example 'خیابان سجاد'
     *
     * @return string
     */
    public function streetName()
    {
        $format = static::randomElement(static::$streetNameFormats);
        return $this->generator->parse($format);
    }

    /**
     * @example "مرند خیابان مجرد"
     *
     * @return string
     */
    public function streetAddress()
    {
        $format = static::randomElement(static::$streetAddressFormats);
        return $this->generator->parse($format);
    }

    /**
     * @example '7717754749'
     *
     * @return string
     */
    public static function postcode()
    {
        return static::toUpper(static::bothify(static::randomElement(static::$postcode)));
    }

    /**
     * @example 'گیلان - کوزه کنان - زنوز خیابان زرشناس - کد پستی 2022834473'
     *
     * @return string
     */
    public function address()
    {
        $format = static::randomElement(static::$addressFormats);
        return $this->generator->parse($format);
    }

    /**
     * @example 'ایران'
     *
     * @return string
     */
    public static function country()
    {
        return static::randomElement(static::$country);
    }
}
