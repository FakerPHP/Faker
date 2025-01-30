<?php

namespace Faker\Provider\pl_PL;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}}',
        '{{lastName}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{companyPrefix}} {{lastName}}',
        '{{lastName}}-{{lastName}}',
    ];

    protected static $companySuffix = ['S.A.', 'i syn', 'sp. z o.o.', 'sp. j.', 'sp. p.', 'sp. k.', 'S.K.A', 's. c.', 'P.P.O.F'];

    protected static $companyPrefix = ['Grupa', 'Fundacja', 'Stowarzyszenie', 'Spółdzielnia'];

    protected static $jobTitleFormat = [
        // Administracja i biuro
        'Archiwista', 'Asystent/ka dyrektora', 'Księgowy/ksęgowa', 'Recepcjonista/recepcjonistka', 'Sekretarka/sekreterz', 'Specjalista ds. administracji', 'Specjalista ds. kadr i płac',
        // IT i technologie informacyjne
        'Administrator systemów IT', 'Analityk danych', 'Inżynier DevOps', 'Kierownik projektów IT', 'Młodszy programista', 'Programista', 'Projektant stron internetowych', 'Specjalista ds. cyberbezpieczeństwa', 'Starszy programista', 'Tester oprogramowania',
        // Finanse i bankowość
        'Analityk finansowy', 'Doradca finansowy', 'Doradca kredytowy', 'Księgowy/ksęgowa', 'Makler giełdowy', 'Specjalista ds. BHP', 'Specjalista ds. controllingu', 'Specjalista ds. windykacji',
        // Handel i sprzedaż
        'Doradca klienta', 'Key Account Manager', 'Kierownik sklepu', 'Merchandiser', 'Przedstawiciel handlowy', 'Specjalista ds. marketingu', 'Specjalista ds. sprzedaży',
        // Produkcja i przemysł
        'Inżynier produkcji', 'Kierownik produkcji', 'Magazynier', 'Monter/monterka', 'Operator maszyn', 'Spawacz', 'Technolog produkcji',
        // Budownictwo i nieruchomości
        'Architekt', 'Deweloper', 'Geodeta', 'Inżynier budowy', 'Kierownik budowy', 'Monter instalacji sanitarnych', 'Specjalista ds. nieruchomości',
        // Medycyna i opieka zdrowotna
        'Asystent/ka stomatologiczna', 'Dietetyk', 'Farmaceuta', 'Fizjoterapeuta', 'Lekarz', 'Pielęgniarka/pielęgniarz', 'Ratownik medyczny',
        // Edukacja i szkolenia
        'Doradca zawodowy', 'Dyrektor szkoły', 'Korepetytor', 'Nauczyciel', 'Specjalista ds. szkoleń', 'Trener biznesu', 'Wychowawca przedszkolny',
        // Transport i logistyka
        'Dyspozytor', 'Kierowca', 'Kurier', 'Logistyk', 'Magazynier', 'Operator wózka widłowego', 'Specjalista ds. transportu',
        // Hotelarstwo i gastronomia
        'Barman/barmanka', 'Kelner/kelnerka', 'Kucharz/kucharka', 'Manager restauracji', 'Pracownik kuchni', 'Recepcjonista/recepcjonistka w hotelu', 'Specjalista ds. obsługi gości',
        // Media i kreatywne zawody
        'Copywriter', 'Dziennikarz', 'Fotograf', 'Grafik komputerowy', 'Producent filmowy', 'Redaktor', 'Specjalista ds. social media',
        // Praca fizyczna i usługi
        'Elektryk', 'Hydraulik', 'Mechanik samochodowy', 'Ogrodnik', 'Ochroniarz', 'Opiekun/ka osób starszych',
        // Nauka i badania
        'Biotechnolog', 'Chemik', 'Fizyk', 'Inżynier badawczo-rozwojowy', 'Laborant/laborantka', 'Naukowiec (różnych dziedzin)',
        // Praca zdalna i freelancing
        'Copywriter', 'Konsultant ds. e-commerce', 'Programista zdalny', 'Projektant graficzny', 'Specjalista ds. marketingu internetowego', 'Tłumacz/tłumaczka',
    ];

    /**
     * @example 'Grupa'
     */
    public static function companyPrefix()
    {
        return static::randomElement(static::$companyPrefix);
    }

    /**
     * Register of the National Economy
     *
     * @see http://pl.wikipedia.org/wiki/REGON
     *
     * @return string 9 digit number
     */
    public static function regon()
    {
        $weights = [8, 9, 2, 3, 4, 5, 6, 7];
        $regionNumber = self::numberBetween(0, 49) * 2 + 1;
        $result = [(int) ($regionNumber / 10), $regionNumber % 10];

        for ($i = 2, $size = count($weights); $i < $size; ++$i) {
            $result[$i] = static::randomDigit();
        }
        $checksum = 0;

        for ($i = 0, $size = count($result); $i < $size; ++$i) {
            $checksum += $weights[$i] * $result[$i];
        }
        $checksum %= 11;

        if ($checksum == 10) {
            $checksum = 0;
        }
        $result[] = $checksum;

        return implode('', $result);
    }

    /**
     * Register of the National Economy, local entity number
     *
     * @see http://pl.wikipedia.org/wiki/REGON
     *
     * @return string 14 digit number
     */
    public static function regonLocal()
    {
        $weights = [2, 4, 8, 5, 0, 9, 7, 3, 6, 1, 2, 4, 8];
        $result = str_split(static::regon());

        for ($i = count($result), $size = count($weights); $i < $size; ++$i) {
            $result[$i] = static::randomDigit();
        }
        $checksum = 0;

        for ($i = 0, $size = count($result); $i < $size; ++$i) {
            $checksum += $weights[$i] * $result[$i];
        }
        $checksum %= 11;

        if ($checksum == 10) {
            $checksum = 0;
        }
        $result[] = $checksum;

        return implode('', $result);
    }
}
