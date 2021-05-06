<?php

namespace Faker\Test\Provider\es_UY;

use Faker\Provider\es_UY\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testCI()
    {
        //Check validation
        self::assertTrue($this->validateCi('57351030'));
        self::assertTrue($this->validateCi('57351046'));
        self::assertFalse($this->validateCi('5735103-3'));
        self::assertFalse($this->validateCi('57351033'));

        //Check generation
        self::assertTrue($this->validateCi($this->faker->ci));
        self::assertTrue($this->validateCi($this->faker->ci));


    }

    /**
     * @param string $ci
     * @return bool
     */
    public function validateCi(string $ci): bool
    {
        $ci = $this->faker->cleanCi($ci);
        $validationDigit = $ci[-1];
        $ci = preg_replace('/[0-9]$/', '', $ci);

        return $validationDigit == $this->faker->validationDigit($ci);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
