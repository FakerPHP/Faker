<?php

namespace Faker\Provider\el_GR;

/**
 * @link https://en.wikipedia.org/wiki/Telephone_numbers_in_Greece
 * @link https://github.com/giggsey/libphonenumber-for-php/blob/master/src/data/PhoneNumberMetadata_GR.php
 */
class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $internationalCallPrefixes = ['', '+30', '+30 '];

    protected static $formats = [
        '{{fixedLineNumber}}',
        '{{mobileNumber}}',
        '{{personalNumber}}',
        '{{tollFreeNumber}}',
        '{{sharedCostNumber}}',
        '{{premiumRateNumber}}',
    ];

    protected static $areaCodes = [
        // Zone 22: Central Greece and the Aegean Islands
        2221, 2222, 2223, 2224, 2226, 2227, 2228, 2229,
        2231, 2232, 2233, 2234, 2235, 2236, 2237, 2238,
        2241, 2242, 2243, 2244, 2245, 2246, 2247,
        2251, 2252, 2253, 2254,
        2261, 2262, 2263, 2264, 2265, 2266, 2267, 2268,
        2271, 2272, 2273, 2274, 2275,
        2281, 2282, 2283, 2284, 2285, 2286, 2287, 2288, 2289,
        2291, 2292, 2293, 2294, 2295, 2296, 2297, 2298, 2299,

        // Zone 23: Central Macedonia and Florina
        231,
        2321, 2322, 2323, 2324, 2325, 2327,
        2331, 2332, 2333,
        2341, 2343,
        2351, 2352, 2353,
        2371, 2372, 2373, 2374, 2375, 2376, 2377,
        2381, 2382, 2384, 2385, 2386,
        2391, 2392, 2393, 2394, 2395, 2396, 2397, 2399,

        // Zone 24: Thessaly and West Macedonia (excluding Florina)
        241,
        2421, 2422, 2423, 2424, 2425, 2426, 2427, 2428,
        2431, 2432, 2433, 2434,
        2441, 2443, 2444, 2445,
        2461, 2462, 2463, 2464, 2465, 2467, 2468,
        2491, 2492, 2493, 2494, 2495,

        // Zone 25: East Macedonia and Thrace
        251,
        2521, 2522, 2523, 2524,
        2531, 2532, 2533, 2534, 2535,
        2541, 2542, 2544,
        2591, 2592, 2593, 2594,
        2551, 2552, 2553, 2554, 2555, 2556,

        // Zone 26: West Greece, Ionian Island and Epirus
        261,
        2621, 2622, 2623, 2624, 2625, 2626,
        2631, 2632, 2634, 2635,
        2661, 2662, 2663, 2664, 2665, 2666,
        2691, 2692, 2693, 2694, 2695, 2696,
        2641, 2642, 2643, 2644, 2645, 2646, 2647,
        2651, 2653, 2654, 2655, 2656, 2657, 2658, 2659,
        2671, 2674,
        2681, 2682, 2683, 2684, 2685,

        // Zone 27: Peloponnese and Kythera
        271,
        2721, 2722, 2723, 2724, 2725,
        2731, 2732, 2733, 2734, 2735, 2736,
        2741, 2742, 2743, 2744, 2745, 2746, 2747,
        2751, 2752, 2753, 2754, 2755, 2757,
        2761, 2763, 2765,
        2791, 2792, 2795, 2797,

        // Zone 28: Crete
        281,
        2821, 2822, 2823, 2824, 2825,
        2831, 2832, 2833, 2834,
        2841, 2842, 2843, 2844,
        2891, 2892, 2893, 2894, 2895, 2897,
    ];

    protected static $fixedLineFormats = [
        '{{internationalCodePrefix}}21########',
        '{{internationalCodePrefix}}21# ### ####',
        '{{internationalCodePrefix}}{{areaCode}}######',
        '{{internationalCodePrefix}}{{areaCode}} ######',
    ];

    protected static $mobileCodes = [
        685, 687, 688, 689,
        690, 691, 693, 694, 695, 696, 697, 698, 699,
    ];

    protected static $mobileFormats = [
        '{{internationalCodePrefix}}{{mobileCode}}#######',
        '{{internationalCodePrefix}}{{mobileCode}} ### ####',
    ];

    protected static $personalFormats = [
        '{{internationalCodePrefix}}70########',
        '{{internationalCodePrefix}}70 #### ####',
    ];

    protected static $tollFreeFormats = [
        '{{internationalCodePrefix}}800#######',
        '{{internationalCodePrefix}}800 ### ####',
    ];

    protected static $sharedCostCodes = [801, 806, 812, 825, 850, 875];

    protected static $sharedCostFormats = [
        '{{internationalCodePrefix}}{{sharedCostCode}}#######',
        '{{internationalCodePrefix}}{{sharedCostCode}} ### ####',
    ];

    protected static $premiumRateCodes = [901, 909];

    protected static $premiumRateFormats = [
        '{{internationalCodePrefix}}{{premiumRateCode}}#######',
        '{{internationalCodePrefix}}{{premiumRateCode}} ### ####',
    ];

    public static function internationalCodePrefix()
    {
        return static::randomElement(static::$internationalCallPrefixes);
    }

    public static function areaCode()
    {
        return static::numerify(
            str_pad(static::randomElement(static::$areaCodes), 4, '#')
        );
    }

    public function fixedLineNumber()
    {
        return static::numerify($this->generator->parse(
            static::randomElement(static::$fixedLineFormats)
        ));
    }

    public static function mobileCode()
    {
        return static::randomElement(static::$mobileCodes);
    }

    public function mobileNumber()
    {
        return static::numerify($this->generator->parse(
            static::randomElement(static::$mobileFormats)
        ));
    }

    /**
     * @deprecated Use PhoneNumber::mobileNumber() instead.
     */
    public function mobilePhoneNumber()
    {
        return $this->mobileNumber();
    }

    public function personalNumber()
    {
        return static::numerify($this->generator->parse(
            static::randomElement(static::$personalFormats)
        ));
    }

    public function tollFreeNumber()
    {
        return static::numerify($this->generator->parse(
            static::randomElement(static::$tollFreeFormats)
        ));
    }

    public static function sharedCostCode()
    {
        return static::randomElement(static::$sharedCostCodes);
    }

    public function sharedCostNumber()
    {
        return static::numerify($this->generator->parse(
            static::randomElement(static::$sharedCostFormats)
        ));
    }

    public static function premiumRateCode()
    {
        return static::randomElement(static::$premiumRateCodes);
    }

    public function premiumRateNumber()
    {
        return static::numerify($this->generator->parse(
            static::randomElement(static::$premiumRateFormats)
        ));
    }
}
