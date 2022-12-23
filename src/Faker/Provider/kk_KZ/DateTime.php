<?php

namespace Faker\Provider\kk_KZ;

class DateTime extends \Faker\Provider\DateTime
{
    /**
     * @param $max
     *
     * @return string
     */
    public static function dayOfWeek($max = 'now')
    {
        $map = [
            'Sunday'    => 'Жексенбі',
            'Monday'    => 'Дүйсенбі',
            'Tuesday'   => 'Сейсенбі',
            'Wednesday' => 'Сәрсенбі',
            'Thursday'  => 'Бейсенбі',
            'Friday'    => 'Жұма',
            'Saturday'  => 'Сенбі',
        ];
        $week = static::dateTime($max)->format('l');

        return $map[$week] ?? $week;
    }

    /**
     * @param $max
     *
     * @return string
     */
    public static function monthName($max = 'now')
    {
        $map = [
            'January'   => 'Қаңтар',
            'February'  => 'Ақпан',
            'March'     => 'Наурыз',
            'April'     => 'Сәуір',
            'May'       => 'Мамыр',
            'June'      => 'Маусым',
            'July'      => 'Шілде',
            'August'    => 'Тамыз',
            'September' => 'Қыркүйек',
            'October'   => 'Қазан',
            'November'  => 'Қараша',
            'December'  => 'Желтоқсан',
        ];
        $month = static::dateTime($max)->format('F');

        return $map[$month] ?? $month;
    }
}
