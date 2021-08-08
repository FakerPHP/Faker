<?php

namespace Faker;

use Faker\Extension\Extension;

/**
 * This generator returns a default value for all called properties
 * and methods. It works with Faker\Generator::optional().
 *
 * @mixin Generator
 */
class ChanceGenerator
{
    private $generator;
    private $weight;
    protected $default;

    /**
     * @param Generator|Extension $generator
     */
    public function __construct($generator, float $weight, $default = null)
    {
        $this->default = $default;
        $this->generator = $generator;
        $this->weight = $weight;
    }

    public function ext(string $id)
    {
        return new self($this->generator->ext($id), $this->weight, $this->default);
    }

    /**
     * Catch and proxy all generator calls but return only valid values
     *
     * @param string $attribute
     *
     * @deprecated Use a method instead.
     */
    public function __get($attribute)
    {
        trigger_deprecation('fakerphp/faker', '1.14', 'Accessing property "%s" is deprecated, use "%s()" instead.', $attribute, $attribute);

        return $this->__call($attribute, []);
    }

    /**
     * @param string $method
     * @param array  $attributes
     */
    public function __call($method, $attributes)
    {
        if (mt_rand(1, 100) <= (100*$this->weight)) {
            return $this->generator;
        }

        return $this->default;
    }
}
