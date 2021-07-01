<?php

namespace Faker\Provider\id_ID;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{companyPrefix}} {{lastName}}',
        '{{companyPrefix}} {{lastName}} {{lastName}}',
        '{{companyPrefix}} {{lastName}} {{companySuffix}}',
        '{{companyPrefix}} {{lastName}} {{lastName}} {{companySuffix}}',
    ];

    /**
     * @see http://id.wikipedia.org/wiki/Jenis_badan_usaha
     */
    protected static $companyPrefix = ['PT', 'CV', 'UD', 'PD', 'Perum'];
    
    /**
     * @see https://www.amesbostonhotel.com/macam-macam-profesi-pekerjaan/
     */   
    protected static $jobTitleFormat = [
        'Guru', 'Dosen', 'Polisi', 'Tentara', 'Pilot', 'Pramugari', 'Satpam', 'Nelayan', 'Penyelam', 'Nahkoda', 
        'Sopir', 'Kondektur', 'Masinis', 'Perawat', 'Dokter', 'Bidan', 'Pengacara', 'Programmer', 'Pedagang', 'Pemandu wisata', 
        'Penambang', 'Petani', 'Peternak', 'Model fashion', 'Designer', 'Tukang', 'Chef', 'Pramusaji', 'Kasir', 'Wartawan', 
        'Seniman', 'Penari', 'Penulis', 'Arsitek', 'Atlet', 'Profesional', 'Porter', 'Apoteker', 'Hakim', 'Jaksa', 'Montir'
    ];

    /**
     * @see http://id.wikipedia.org/wiki/Jenis_badan_usaha
     */
    protected static $companySuffix = ['(Persero) Tbk', 'Tbk'];

    /**
     * Get company prefix
     *
     * @return string company prefix
     */
    public static function companyPrefix()
    {
        return static::randomElement(static::$companyPrefix);
    }

    /**
     * Get company suffix
     *
     * @return string company suffix
     */
    public static function companySuffix()
    {
        return static::randomElement(static::$companySuffix);
    }
}
