<?php

namespace Faker\Provider\pt_BR;

require_once 'check_digit.php';

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companySuffix}}',
        '{{lastName}}-{{lastName}}',
        '{{lastName}} e {{lastName}}',
        '{{lastName}} e {{lastName}} {{companySuffix}}',
        '{{lastName}} Comercial Ltda.',
    ];

    protected static $companySuffix = ['e Filhos', 'e Associados', 'Ltda.', 'S.A.'];

    /**
     * A random CNPJ number.
     *
     * @see http://en.wikipedia.org/wiki/CNPJ
     *
     * @param bool $formatted If the number should have dots/slashes/dashes or not.
     *
     * @return string
     */
    public function cnpj($formatted = true)
    {
        $n = $this->generator->numerify('########0001');
        $n .= check_digit($n);
        $n .= check_digit($n);

        return $formatted ? vsprintf('%d%d.%d%d%d.%d%d%d/%d%d%d%d-%d%d', str_split($n)) : $n;
    }

    /**
     * A random CNPJ alphanumeric.
     *
     * @see http://en.wikipedia.org/wiki/CNPJ
     *
     * @param bool $formatted If the number should have dots/slashes/dashes or not.
     *
     * @return string
     */
    public function cnpjAlpha($formatted = true)
    {
        $pool = array_merge(range('A', 'Z'), range('0', '9'));
        $n = implode('', array_map(fn () => $pool[array_rand($pool)], range(0, 7))) . '0001';
        $n .= check_digit_alpha($n);
        $n .= check_digit_alpha($n);

        return $formatted ? vsprintf('%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s', str_split($n)) : $n;
    }
}
