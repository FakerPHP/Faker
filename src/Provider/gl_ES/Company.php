<?php

namespace Faker\Provider\gl_ES;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{companyPrefix}} {{lastName}} {{companySuffix}}',
        '{{companyPrefix}} {{lastName}}',
        '{{companyPrefix}} {{lastName}}-{{lastName}}',
        '{{lastName}}-{{lastName}} {{companySuffix}}',
        '{{lastName}} e {{lastName}} {{companySuffix}}',
        '{{lastName}}, {{lastName}} e {{lastName}} {{companySuffix}}',
        '{{lastName}} e Fillos {{companySuffix}}',
        '{{lastName}}-{{lastName}}',
        '{{lastName}} e {{lastName}}',
    ];

    protected static $companyPrefix = [
        'Adegas', 'Asociación', 'Conservas', 'Construcións', 'Distribucións', 'Grupo', 'Mariscos', 'Obradoiro', 'Transportes', 'Viaxes',
    ];

    protected static $companySuffix = ['S.L.', 'S.L.U.', 'S.A.', 'S.Coop.Galega'];

    /**
     * @example 'Conservas'
     */
    public static function companyPrefix()
    {
        return static::randomElement(static::$companyPrefix);
    }
}
