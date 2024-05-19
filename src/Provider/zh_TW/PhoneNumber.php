<?php

namespace Faker\Provider\zh_TW;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+8869########',
        '+886-9##-###-###',
        '09########',
        '09##-###-###',
        '(02)########',
        '(02)####-####',
        '(0#)#######',
        '(0#)###-####',
        '(0##)######',
        '(0##)###-###',
    ];

    public function cellPhoneNumber(bool $addDashes = false)
    {
        if ($addDashes) {
            return self::numerify('09##-###-###');
        }

        return self::numerify('09########');
    }

    public function intlCellPhoneNumber(bool $addDashes = false)
    {
        if ($addDashes) {
            return self::numerify('+886-9##-###-###');
        }

        return self::numerify('+8869########');
    }

    public function localPhoneNumber(bool $addDashes = false)
    {
        if ($addDashes) {
            return self::numerify(
                self::randomElement(
                    [
                        '(02)####-####',
                        '(0#)###-####',
                        '(0##)###-###',
                    ],
                ),
            );
        }

        return self::numerify(
            self::randomElement(
                [
                    '(02)########',
                    '(0#)#######',
                    '(0##)######',
                ],
            ),
        );
    }
}
