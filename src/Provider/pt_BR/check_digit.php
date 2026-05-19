<?php

namespace Faker\Provider\pt_BR;

/**
 * Calculates one MOD 11 check digit based on customary Brazilian algorithms.
 *
 * @see http://en.wikipedia.org/wiki/Check_digit
 * @see http://pt.wikipedia.org/wiki/CNPJ#Algoritmo_de_Valida.C3.A7.C3.A3o
 * @see http://en.wikipedia.org/wiki/Cadastro_de_Pessoas_F%C3%ADsicas#Validation
 *
 * @param int|string $numbers Numbers on which generate the check digit
 *
 * @return int
 */
function check_digit($numbers)
{
    $numbers = (string) $numbers;
    $length = strlen($numbers);
    $second_algorithm = $length >= 12;
    $verifier = 0;

    for ($i = 1; $i <= $length; ++$i) {
        if (!$second_algorithm) {
            $multiplier = $i + 1;
        } else {
            $multiplier = ($i >= 9) ? $i - 7 : $i + 1;
        }
        $verifier += $numbers[$length - $i] * $multiplier;
    }

    $verifier = 11 - ($verifier % 11);

    if ($verifier >= 10) {
        $verifier = 0;
    }

    return $verifier;
}

/**
 * Like check_digit(), but accepts alphanumeric strings (A–Z map to 10–35).
 *
 * @param string $str
 *
 * @return int
 */
function check_digit_alpha($str)
{
    $str = strtoupper((string) $str);
    $length = strlen($str);
    $second_algorithm = $length >= 12;
    $verifier = 0;

    for ($i = 1; $i <= $length; ++$i) {
        $c = $str[$length - $i];
        $val = ord($c) - 48;
        $multiplier = $second_algorithm ? ($i >= 9 ? $i - 7 : $i + 1) : $i + 1;
        $verifier += $val * $multiplier;
    }

    $verifier = 11 - ($verifier % 11);

    return $verifier >= 10 ? 0 : $verifier;
}
