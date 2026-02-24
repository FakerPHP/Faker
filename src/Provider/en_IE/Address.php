<?php

namespace Faker\Provider\en_IE;

class Address extends \Faker\Provider\Address
{
    protected static $buildingNumber = ['%##', '%#', '%'];

    protected static $streetSuffix = [
        'Avenue',
        'Close', 'Court', 'Crescent',
        'Drive',
        'Gardens', 'Glen', 'Green', 'Grove',
        'Heights',
        'Lane', 'Lawn',
        'Meadow',
        'Park', 'Place',
        'Rise', 'Road',
        'Square', 'Street',
        'Terrace',
        'View',
        'Walk', 'Way',
    ];

    /**
     * @see https://www.eircode.ie/
     */
    protected static $eircodeRoutingKeys = [
        'A41', 'A42', 'A45', 'A63', 'A67', 'A75', 'A81', 'A82', 'A83', 'A84', 'A85', 'A86', 'A91', 'A92', 'A94', 'A96', 'A98',
        'C15',
        'D01', 'D02', 'D03', 'D04', 'D05', 'D06', 'D6W', 'D07', 'D08', 'D09', 'D10', 'D11', 'D12', 'D13', 'D14', 'D15', 'D16', 'D17', 'D18', 'D20', 'D22', 'D24',
        'E21', 'E25', 'E32', 'E34', 'E41', 'E45', 'E53', 'E91',
        'F12', 'F23', 'F26', 'F28', 'F31', 'F35', 'F42', 'F45', 'F52', 'F56', 'F91', 'F92', 'F93', 'F94',
        'H12', 'H14', 'H16', 'H18', 'H23', 'H53', 'H54', 'H62', 'H65', 'H71', 'H91',
        'K32', 'K34', 'K36', 'K45', 'K56', 'K67', 'K78',
        'N37', 'N39', 'N41', 'N91',
        'P12', 'P14', 'P17', 'P24', 'P25', 'P31', 'P32', 'P36', 'P43', 'P47', 'P51', 'P56', 'P61', 'P67', 'P72', 'P75', 'P81', 'P85',
        'R14', 'R21', 'R32', 'R35', 'R42', 'R45', 'R51', 'R56', 'R93', 'R95',
        'T12', 'T23', 'T34', 'T45', 'T56',
        'V14', 'V15', 'V23', 'V31', 'V35', 'V42', 'V92', 'V93', 'V94', 'V95',
        'W12', 'W23', 'W34', 'W91',
        'X35', 'X42', 'X91',
        'Y14', 'Y21', 'Y25', 'Y34', 'Y35',
    ];

    protected static $cityNames = [
        'Arklow', 'Ashbourne', 'Athlone',
        'Birr', 'Bray',
        'Carlow', 'Castlebar', 'Cavan', 'Celbridge', 'Clifden', 'Clonmel', 'Cobh', 'Cork',
        'Dalkey', 'Dingle', 'Drogheda', 'Dublin', 'Dundalk', 'Dungarvan',
        'Ennis', 'Enniscorthy',
        'Galway', 'Gorey', 'Greystones',
        'Howth',
        'Kenmare', 'Kilkenny', 'Killarney', 'Kinsale',
        'Leixlip', 'Letterkenny', 'Limerick', 'Longford',
        'Malahide', 'Mallow', 'Maynooth', 'Midleton', 'Monaghan', 'Mullingar',
        'Naas', 'Navan', 'New Ross',
        'Portlaoise', 'Portmarnock',
        'Roscommon',
        'Sligo', 'Swords',
        'Thurles', 'Tralee', 'Trim', 'Tullamore',
        'Waterford', 'Westport', 'Wexford', 'Wicklow',
    ];

    protected static $county = [
        'Carlow', 'Cavan', 'Clare', 'Cork',
        'Donegal', 'Dublin',
        'Galway',
        'Kerry', 'Kildare', 'Kilkenny',
        'Laois', 'Leitrim', 'Limerick', 'Longford', 'Louth',
        'Mayo', 'Meath', 'Monaghan',
        'Offaly',
        'Roscommon',
        'Sligo',
        'Tipperary',
        'Waterford', 'Westmeath', 'Wexford', 'Wicklow',
    ];

    protected static $country = [
        'Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica (the territory South of 60 deg S)', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan',
        'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Bouvet Island (Bouvetoya)', 'Brazil', 'British Indian Ocean Territory (Chagos Archipelago)', 'British Virgin Islands', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Burundi',
        'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote d\'Ivoire', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic',
        'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic',
        'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia',
        'Faroe Islands', 'Falkland Islands (Malvinas)', 'Fiji', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Territories',
        'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana',
        'Haiti', 'Heard Island and McDonald Islands', 'Holy See (Vatican City State)', 'Honduras', 'Hong Kong', 'Hungary',
        'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy',
        'Jamaica', 'Japan', 'Jersey', 'Jordan',
        'Kazakhstan', 'Kenya', 'Kiribati', 'Korea', 'Korea', 'Kuwait', 'Kyrgyz Republic',
        'Lao People\'s Democratic Republic', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg',
        'Macao', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar',
        'Namibia', 'Nauru', 'Nepal', 'Netherlands Antilles', 'Netherlands', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway',
        'Oman',
        'Pakistan', 'Palau', 'Palestinian Territories', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn Islands', 'Poland', 'Portugal', 'Puerto Rico',
        'Qatar',
        'Reunion', 'Romania', 'Russian Federation', 'Rwanda',
        'Saint Barthelemy', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Martin', 'Saint Pierre and Miquelon', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia (Slovak Republic)', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and the South Sandwich Islands', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard & Jan Mayen Islands', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic',
        'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu',
        'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States of America', 'United States Minor Outlying Islands', 'United States Virgin Islands', 'Uruguay', 'Uzbekistan',
        'Vanuatu', 'Venezuela', 'Vietnam',
        'Wallis and Futuna', 'Western Sahara',
        'Yemen',
        'Zambia', 'Zimbabwe',
    ];

    protected static $cityFormats = [
        '{{cityName}}',
    ];

    protected static $streetNameFormats = [
        '{{firstName}} {{streetSuffix}}',
        '{{lastName}} {{streetSuffix}}',
    ];

    protected static $streetAddressFormats = [
        '{{buildingNumber}} {{streetName}}',
        '{{buildingNumber}} {{streetName}}',
        "{{secondaryAddress}}\n{{streetName}}",
    ];

    protected static $addressFormats = [
        "{{streetAddress}}\n{{city}}\nCo. {{county}}\n{{postcode}}",
    ];

    protected static $secondaryAddressFormats = ['Apt. ##', 'Apartment ##', 'Suite ##'];

    /**
     * @example 'Dublin'
     */
    public static function cityName()
    {
        return static::randomElement(static::$cityNames);
    }

    /**
     * @example 'Apt. 5'
     */
    public static function secondaryAddress()
    {
        return static::bothify(static::randomElement(static::$secondaryAddressFormats));
    }

    /**
     * @example 'Cork'
     */
    public static function county()
    {
        return static::randomElement(static::$county);
    }

    /**
     * Generate an Irish Eircode.
     *
     * @see https://www.eircode.ie/
     *
     * @example 'D02 AF49'
     */
    public static function eircode()
    {
        $routingKey = static::randomElement(static::$eircodeRoutingKeys);
        $uniqueId = static::toUpper(static::bothify('****'));

        return $routingKey . ' ' . $uniqueId;
    }

    /**
     * @example 'D02 AF49'
     */
    public static function postcode()
    {
        return static::eircode();
    }
}
