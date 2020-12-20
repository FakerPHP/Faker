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

class Color extends \Faker\Provider\Color
{
    protected static $safeColorNames = [
        'ขาว', 'ชมพู', 'ดำ', 'น้ำตาล', 'น้ำเงิน', 'ฟ้า', 'ม่วง', 'ส้ม', 'เขียว', 'เขียวอ่อน', 'เหลือง', 'แดง'
    ];

    protected static $allColorNames = [
        'กากี', 'ขาว', 'คราม', 'ชมพู', 'ดำ', 'ทอง', 'นาค', 'น้ำตาล',
        'น้ำเงิน', 'ฟ้า', 'ม่วง', 'ส้ม', 'เขียว', 'เขียวอ่อน',
        'เงิน', 'เทา', 'เหลือง', 'เหลืองอ่อน', 'แดง', '่ขี้ม้า'
    ];
}
