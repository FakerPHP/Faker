<?php

namespace Faker\Provider\gl_ES;

class PhoneNumber extends \Faker\Provider\es_ES\PhoneNumber
{
    /**
     * Galician landline prefixes: 981 (A Coruña), 982 (Lugo), 986 (Pontevedra) and 988 (Ourense).
     *
     * @see https://es.wikipedia.org/wiki/Anexo:Prefijos_telef%C3%B3nicos_de_Espa%C3%B1a
     */
    protected static $formats = [
        '+34 981 ## ## ##',
        '+34 982 ## ## ##',
        '+34 986 ## ## ##',
        '+34 988 ## ## ##',
        '+34 981######',
        '+34 982######',
        '+34 986######',
        '+34 988######',
        '981 ## ## ##',
        '982 ## ## ##',
        '986 ## ## ##',
        '988 ## ## ##',
        '981######',
        '982######',
        '986######',
        '988######',
    ];
}
