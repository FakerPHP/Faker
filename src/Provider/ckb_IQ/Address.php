<?php

namespace Faker\Provider\ckb_IQ;

class Address extends \Faker\Provider\Address
{
    protected static $cityPrefix = ['شاری'];
    protected static $streetPrefix = ['شەقامی'];
    protected static $buildingNumberPrefix = ['خانووی ژمارە', 'بینای ژمارە'];
    protected static $postcodePrefix = ['کۆدی پۆستی'];

    protected static $streetMeters = ['۳۰', '۴۰', '۶۰', '۱۰۰', '۱۲۰', '۱۵۰'];

    protected static $buildingNumber = ['##'];

    protected static $cityName = [
        'هەولێر', 'سلێمانی', 'دهۆک', 'هەڵەبجە', 'کەرکووک',
        'زاخۆ', 'ئاکرێ', 'ئامێدی', 'کۆیە', 'ڕانیە', 'قەڵادزێ',
        'چەمچەماڵ', 'کفری', 'کەلار', 'خانەقین', 'ڕەواندز',
        'شەقڵاوە', 'سۆران', 'شنگال', 'بامەرنێ', 'سێمێل',
        'پێنجوێن', 'دۆکان',
    ];

    protected static $cityFormats = [
        '{{cityName}}',
        '{{cityPrefix}} {{cityName}}',
    ];

    protected static $streetNameFormats = [
        '{{streetPrefix}} {{lastName}}',
        '{{streetPrefix}} {{streetMeters}} مەتری',
        'گەڕەکی {{lastName}}',
    ];

    protected static $streetAddressFormats = [
        '{{streetName}}، {{buildingNumberPrefix}} {{buildingNumber}}',
    ];

    protected static $addressFormats = [
        '{{city}}، {{streetAddress}}',
        '{{city}}، {{streetAddress}}، {{postcodePrefix}} {{postcode}}',
    ];

    protected static $postcode = ['#####'];

    protected static $country = ['عێراق', 'هەرێمی کوردستان'];

    /**
     * @example 'شاری'
     */
    public static function cityPrefix()
    {
        return static::randomElement(static::$cityPrefix);
    }

    /**
     * @example 'هەولێر'
     */
    public static function cityName()
    {
        return static::randomElement(static::$cityName);
    }

    /**
     * @example 'شەقامی'
     */
    public static function streetPrefix()
    {
        return static::randomElement(static::$streetPrefix);
    }

    /**
     * @example '۱۰۰'
     */
    public static function streetMeters()
    {
        return static::randomElement(static::$streetMeters);
    }

    /**
     * @example 'خانووی ژمارە'
     */
    public static function buildingNumberPrefix()
    {
        return static::randomElement(static::$buildingNumberPrefix);
    }

    /**
     * @example 'کۆدی پۆستی'
     */
    public static function postcodePrefix()
    {
        return static::randomElement(static::$postcodePrefix);
    }
}
