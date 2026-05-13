<?php

namespace Faker\Provider\en_CA;

class Person extends \Faker\Provider\Person {

    /**
     * @example '744-884-672'
     *
     * @return string
     *
     * Generated values are intentionally not Luhn-valid and should be used for testing purposes only.
     */
    public function sin()
    {

    $first = static::randomElement([1,2,3,4,5,6,7,9]);
    return $first . static::numerify('##-###-###');

    }
}