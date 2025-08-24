<?php

namespace Faker\Provider\en_KE;

/**
 * Class Company
 * 
 * Provides Kenyan-specific company names for Faker.
 * Includes well-known companies and organizations in Kenya.
 * Extends the base Faker Company provider.
 */
class Company extends \Faker\Provider\Company
{
    /**
     * @var array List of Kenyan company names.
     * See https://en.wikipedia.org/wiki/List_of_companies_of_Kenya
     */
    protected static $companyName = [
        'Jumia Kenya',
        'Safaricom',
        'Kenya Airways',
        'Equity Bank',
        'KCB',
        'M-KOPA',
        'Twiga Foods',
        'KenGen',
        'East African Breweries',
        'Airtel Kenya',
        'Kenya Power and Lighting Company',
        'Bamburi Cement',
        'CBA',
        'Nation Media',
        'Kenya Commercial Bank',
        'Britam',
        'Cooperative Bank of Kenya',
        'Kenya Reinsurance Corporation',
        'Bidco Africa',
        'Centum Investment',
        'I&M Bank',
        'Sameer Group',
        'Mumias Sugar',
        'Brookside Dairy',
        'Total Kenya',
        'Kapa Oil Refineries',
        'WPP Scangroup',
        'Kenya Pipeline Company',
        'TransCentury',
        'Kenya Tea Development Agency',
        'Serena Hotels',
        'Carbacid Investments',
        'Diamond Trust Bank Kenya',
        'Uchumi Supermarkets',
        'Sportpesa',
        'Safarilink Aviation',
        'Kenya Electricity Generating Company',
        'Nation Broadcasting Corporation',
        'Nairobi Securities Exchange',
        'Athi River Mining',
        'Lake Turkana Wind Power',
        'East African Portland Cement',
        'Haco Industries',
        'CIC Insurance Group',
        'Zuku Kenya',
        'One Acre Fund',
        'Sendy',
        'SolarNow Kenya',
        'Craft Silicon',
        'Cellulant',
        'BitPesa',
        'Msitu Africa Carbon Alliance',
        'Sokowatch',
    ];

    /**
     * @var array Common Kenyan company suffixes to append.
     */
    protected static $companySuffix = [
        'Ltd.',
        'Limited',
        'PLC',
        'Holdings',
        'Group',
        'Corporation',
        'Enterprises',
    ];

    /**
     * Returns a random company name with an optional suffix.
     *
     * This method randomly appends a suffix such as "Ltd.", "Limited", or "PLC" to
     * Kenyan company names to better reflect local naming conventions.
     * 
     * @return string
     */
    public function company()
    {
        // Select a base company name
        $company = static::randomElement(static::$companyName);

        // Randomly decide whether to append a suffix (50% chance)
        if ($this->generator->boolean(50)) {
            $suffix = static::randomElement(static::$companySuffix);

            // Append suffix only if it's not already part of the company name (case-insensitive)
            if (stripos($company, $suffix) === false) {
                $company .= ' ' . $suffix;
            }
        }

        return $company;
    }
}
