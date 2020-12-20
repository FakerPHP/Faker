<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\th_TH;

class Payment extends \Faker\Provider\Payment
{
    /**
     * @var array Thai bank names
     * @link https://th.wikipedia.org/wiki/%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%8A%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%98%E0%B8%99%E0%B8%B2%E0%B8%84%E0%B8%B2%E0%B8%A3%E0%B9%83%E0%B8%99%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%97%E0%B8%A8%E0%B9%84%E0%B8%97%E0%B8%A2
     */
    protected static $banks = [
        'ธนาคารแห่งประเทศไทย',
        'ธนาคารกรุงเทพ',
        'ธนาคารกรุงศรีอยุธยา',
        'ธนาคารกสิกรไทย',
        'ธนาคารเกียรตินาคิน',
        'ธนาคารซีไอเอ็มบีไทย',
        'ธนาคารทหารไทย',
        'ธนาคารทิสโก้',
        'ธนาคารไทยพาณิชย์',
        'ธนาคารไทยเครดิตเพื่อรายย่อย',
        'ธนาคารธนชาต',
        'ธนาคารยูโอบี',
        'ธนาคารแลนด์ แอนด์ เฮาส์',
        'ธนาคารสแตนดาร์ดชาร์เตอร์ด (ไทย)',
        'ธนาคารกรุงไทย',
        'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย',
        'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร',
        'ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย',
        'ธนาคารออมสิน',
        'ธนาคารอาคารสงเคราะห์',
        'ธนาคารอิสลามแห่งประเทศไทย',
        'ธนาคารไอซีบีซี (ไทย)',
    ];

    /**
     * @example 'ธนาคารกสิกรไทย'
     */
    public static function bank()
    {
        return static::randomElement(static::$banks);
    }
}
