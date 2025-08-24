<?php

namespace Faker\Provider\en_KE;

/**
 * Class PhoneNumber
 * 
 * Provides realistic Kenyan phone number formats for Faker,
 * including E.164 international standard formats.
 */
class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    /**
     * Local and international-style phone number formats.
     */
    protected static $formats = [
        '+2547########',   // Mobile international format
        '07########',      // Local mobile format
        '+2541########',   // Landline international format
        '01########',      // Newer mobile prefixes (010, 011)
    ];

    /**
     * E.164-compliant phone number formats for Kenya.
     * All begin with +254 (Kenya's country code).
     */
    protected static $e164Formats = [
        '+2547########',     // Traditional mobile prefixes
        '+2541########',     // Landline (Nairobi and major towns)
        '+25410#######',     // New Safaricom/other mobile series
        '+25411#######',     // Additional mobile prefix range
    ];
}
