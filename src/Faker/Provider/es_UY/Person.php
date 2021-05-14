<?php

namespace Faker\Provider\es_UY;

class Person extends \Faker\Provider\Person
{

    public const BASE_NUMBER = "2987634";

    /**
     * @param string $ci
     * @return string
     */
    public function cleanCi(string $ci): string
    {
        return preg_replace('/\D/', '', $ci);
    }

    /**
     * @param string $ci
     * @return int
     */
    public function validationDigit(string $ci): int
    {
        $ci = $this->cleanCi($ci);

        $ci = str_pad($ci, 7, '0', STR_PAD_LEFT);

        $a = 0;

        for ($i = 0; $i < 7; $i++) {
            $a += (intval(self::BASE_NUMBER[$i]) * intval($ci[$i])) % 10;
        }

        return $a % 10 == 0 ? 0 : 10 - $a % 10;
    }

    /**
     * Generate a Cedula de Identidad (CI) number
     *
     * @example 39568450'
     * @return string
     * @see https://es.wikipedia.org/wiki/C%C3%A9dula_de_Identidad_de_Uruguay
     */
    public function ci(): string
    {
        $ci = (string)floor(((float)rand() / (float)getrandmax()) * 10000000);

        return substr($ci, 0, 7) . $this->validationDigit($ci);
    }
}
