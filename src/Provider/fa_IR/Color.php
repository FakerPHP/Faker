<?php

namespace Faker\Provider\fa_IR;

class Color extends \Faker\Provider\Color
{
    protected static $safeColorNames = [
        'سیاه', 'سفید', 'آبی', 'قرمز',
        'زرد', 'سبز', 'نارنجی', 'بنفش',
    ];
    
    /**
     * A selection from the page below
     *
     * @see https://fa.wikipedia.org/wiki/%D9%81%D9%87%D8%B1%D8%B3%D8%AA_%D8%B1%D9%86%DA%AF%E2%80%8C%D9%87%D8%A7_(%D9%81%D8%B4%D8%B1%D8%AF%D9%87)
     */
    protected static $allColorNames = [
        'لاجوردی', 'بژ', 'سیاه', 'آبی', 'قهوه‌ای', 'شکلاتی', 'زرشکی',
        'فیروزه‌ای', 'سرخابی', 'خاکستری', 'سفید', 'طلایی', 'سبز',
        'نیلی', 'خاکی', 'خرمایی', 'یشمی', 'سرمه‌ای',
        'زیتونی', 'نارنجی', 'صورتی', 'بنفش', 'قرمز',
        'صدفی', 'نقره‌ای', 'آبی آسمانی', 'زرد',
    ];
}
