<?php

namespace Faker\Provider\en_KE;

class Internet extends \Faker\Provider\Internet
{
    /**
     * Common free and local email domains used in Kenya.
     */
    protected static $freeEmailDomain = [
        'gmail.com',
        'yahoo.com',
        'outlook.com',
        'hotmail.com',
        'icloud.com',
        'yahoo.co.ke',
        'protonmail.com',
        'mail.com',
    ];

    /**
     * Common domain suffixes (TLDs) used in Kenya.
     * Includes generic and country-specific.
     */
    protected static $tld = [
        'com',
        'org',
        'net',
        'co.ke',
        'or.ke',
        'ac.ke',
        'sc.ke',
        'go.ke',
        'info',
        'biz',
    ];

    /**
     * Common Kenyan ISPs and tech companies (optional extension).
     */
    protected static $ispDomains = [
        'safaricom.co.ke',
        'telkom.co.ke',
        'zuku.co.ke',
        'jtl.co.ke',
        'faiba.co.ke',
        'liquidtelecom.com',
    ];

    /**
     * Override domain name to include Kenyan-specific suffixes
     */
    public function domainName()
    {
        $company = static::domainWord();
        $tld = static::randomElement(static::$tld);

        return strtolower($company . '.' . $tld);
    }

    /**
     * Generate a realistic local email
     */
    public function freeEmail()
    {
        return static::userName() . '@' . static::randomElement(static::$freeEmailDomain);
    }

    /**
     * Generate ISP or business-style email
     */
    public function companyEmail()
    {
        return static::userName() . '@' . static::randomElement(static::$ispDomains);
    }

    /**
     * Generate a safe, realistic Kenyan email address
     */
    public function email()
    {
        return $this->freeEmail();
    }
}
