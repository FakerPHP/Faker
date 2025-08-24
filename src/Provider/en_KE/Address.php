<?php

namespace Faker\Provider\en_KE;

/**
 * Class Address
 * 
 * Provides Kenyan specific address data for Faker.
 * Includes cities, counties, streets, and regions commonly used in Kenya.
 * Extends the base Faker Address provider.
 * See https://en.wikipedia.org/wiki/Provinces_of_Kenya
 */
class Address extends \Faker\Provider\Address
{
    /**
     * @var array List of major cities, municipalities, county headquarters, and local towns in Kenya. 
     */
    protected static $city = [
        'Nairobi',
        'Mombasa',
        'Nakuru',
        'Ruiru',
        'Eldoret',
        'Kisumu',
        'Kikuyu',
        'Thika',
        'Naivasha',
        'Karuri',
        'Kitale',
        'Juja',
        'Kitengela',
        'Kiambu',
        'Malindi',
        'Mandera',
        'Kisii',
        'Kakamega',
        'Ngong',
        'Mtwapa',
        'Wajir',
        'Lodwar',
        'Limuru',
        'Athi River',
        'Meru',
        'Nyeri',
        'Isiolo',
        'Ukunda',
        'Kiserian',
        'Kilifi',
        'Nanyuki',
        'Busia',
        'Migori',
        'Bungoma',
        'Narok',
        'Embu',
        'Machakos',
        'El Wak',
        'Gilgil',
        'Kericho',
        'Voi',
        'Wanguru',
        'Homa Bay',
        'Githunguri',
        'Baragoi',
        'Bondo',
        'Butere',
        'Dadaab',
        'Diani Beach',
        'Emali',
        'Gede',
        'Hola',
        'Kitui',
        'Kibwezi',
        'Lang’ata',
        'Litein',
        'Loyangalani',
        'Makindu',
        'Maralal',
        'Muranga',
        'Mutomo',
        'Naro Moru',
        'Namanga',
        'Nyahururu',
        'Rongo',
        'Shimoni',
        'Takaungu',
        'Ugunja',
        'Vihiga',
        'Watamu',
        'Wote',
        'Wundanyi',
        'Kakuma',
        'Kapenguria',
        'Keroka',
        'Mumias',
        'Ol Kalou',
        'Suneka',
        'Oyugis',
        'Nambale',
        'Tabaka',
        'Muhoroni',
        'Rumuruti',
        'Burnt Forest',
        'Maragua',
        'Kendu Bay',
        'Bomet',
        'Iten',
        'Kapsabet',
        'Kabarnet',
        'Kathwana',
        'Kerugoya',
        'Murang’a',
        'Mbale',
        'Siaya',
        'Nyamira',
        'Lamu',
        'Mwatate',
        'Kwale',
        'Makueni',
    ];

    /**
     * @var array List of all Kenyan counties. 
     */
    protected static $county = [
        'Mombasa',
        'Kwale',
        'Kilifi',
        'Tana River',
        'Lamu',
        'Taita Taveta',
        'Garissa',
        'Wajir',
        'Mandera',
        'Marsabit',
        'Isiolo',
        'Meru',
        'Tharaka-Nithi',
        'Embu',
        'Kitui',
        'Machakos',
        'Makueni',
        'Nyandarua',
        'Nyeri',
        'Kirinyaga',
        'Murang’a',
        'Kiambu',
        'Turkana',
        'West Pokot',
        'Samburu',
        'Trans Nzoia',
        'Uasin Gishu',
        'Elgeyo-Marakwet',
        'Nandi',
        'Baringo',
        'Laikipia',
        'Nakuru',
        'Narok',
        'Kajiado',
        'Kericho',
        'Bomet',
        'Kakamega',
        'Vihiga',
        'Bungoma',
        'Busia',
        'Siaya',
        'Kisumu',
        'Homa Bay',
        'Migori',
        'Kisii',
        'Nyamira',
        'Nairobi',
    ];

    /**
     * @var array Streets commonly found in major Kenyan cities.
     */
    protected static $street = [
        // Nairobi streets
        'Moi Avenue',
        'Kenyatta Road',
        'Jomo Kenyatta Street',
        'Uhuru Highway',
        'Haile Selassie Avenue',
        'Kangundo Road',
        'Tom Mboya Street',
        'Mombasa Road',
        'State House Road',
        'Mfangano Street',
        'Haile Selassie Drive',
        'Ronald Ngala Street',
        'Nairobi West Road',
        'Langata Road',
        'Ngong Road',
        'Limuru Road',
        'Muthithi Road',
        'Roysambu Road',
        'Kileleshwa Road',
        'Wabera Street',

        // Mombasa streets
        'Digo Road',
        'Moi Avenue, Mombasa',
        'Nkrumah Road',
        'Shimanzi Road',
        'Mbaraki Road',
        'Nyerere Road',
        'Mama Ngina Drive',
        'Makupa Road',
        'Mwatate Road',

        // Nakuru streets
        'Kenya Road',
        'Ongata Road',
        'Moi Road, Nakuru',
        'State House Road, Nakuru',
        'Rift Valley Road',
        'Market Street',
        'Tom Mboya Street, Nakuru',

        // Kisumu streets
        'Oginga Odinga Road',
        'Argwings Kodhek Road',
        'Jomo Kenyatta Highway, Kisumu',
        'Otieno Oyoo Road',
        'Ojijo Road',
        'Lake View Road',

        // Eldoret streets
        'Kapsoya Road',
        'Moi Road, Eldoret',
        'Kipkaren Road',
        'Turkana Road',
        'Mugusu Road',
        'Nairobi Road, Eldoret',

        // Additional notable streets from other towns
        'Moi Street, Nyeri',
        'Kenyatta Street, Kisii',
        'Moi Avenue, Kericho',
        'Kipchoge Road, Eldoret',
    ];

    /**
     * @var array List of Kenya's broad geographical regions.
     * @see https://en.wikipedia.org/wiki/Provinces_of_Kenya
     */
    protected static $region = [
        'Nairobi',
        'Central',
        'Coastal',
        'Eastern',
        'Northern',
        'Western',
        'Rift Valley',
    ];

    /**
     * Returns a random Kenyan region.
     * 
     * @return string
     */
    public function region()
    {
        return static::randomElement(static::$region);
    }

    /**
     * Returns a random Kenyan county.
     * 
     * @return string
     */
    public function county()
    {
        return static::randomElement(static::$county);
    }

    /**
     * Returns a random Kenyan city or town.
     * 
     * @return string
     */
    public function city()
    {
        return static::randomElement(static::$city);
    }

    /**
     * Alias for city() to provide town name.
     * 
     * @return string
     */
    public function town()
    {
        return $this->city();
    }

    /**
     * Generates a random Kenyan postal code.
     * Kenyan postal codes typically fall into defined numeric ranges based on region.
     * 
     * @return string Postal code as a 5-digit zero-padded string
     */
    public static function postcode()
    {
        $ranges = [
            [100, 999],     // Nairobi, Mombasa, and other central areas (e.g. 00100-00999)
            [10000, 19999], // Central and Eastern regions
            [20000, 29999], // Rift Valley region
            [30000, 39999], // Western region
            [40000, 49999], // Nyanza region
        ];

        $range = static::randomElement($ranges);

        $postcode = static::numberBetween($range[0], $range[1]);

        // Ensure postal code is zero-padded to 5 digits
        return str_pad($postcode, 5, '0', STR_PAD_LEFT);
    }

    /**
     * Returns a random street name from the Kenyan streets list.
     * 
     * @return string
     */
    public function streetName()
    {
        return static::randomElement(static::$street);
    }

    /**
     * Generates a street address combining a random street number with a street name.
     * 
     * @return string Full street address
     */
    public function streetAddress()
    {
        $number = $this->numberBetween(1, 200);
        return $number . ' ' . $this->streetName();
    }
}
