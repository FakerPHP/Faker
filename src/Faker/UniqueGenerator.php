<?php

namespace Faker;

use Faker\Extension\Extension;

/**
 * Proxy for other generators that returns only unique values.
 *
 * Instantiated through @see Generator::unique().
 *
 * @mixin Generator
 */
class UniqueGenerator
{
    protected $generator;
    protected $maxRetries;

    /**
     * Maps from method names to a map with serialized result keys.
     *
     * @example [
     *   'phone' => ['0123' => null],
     *   'city' => ['London' => null, 'Tokyo' => null],
     * ]
     *
     * @var array<string, array<string, null>>
     */
    protected $uniques = [];

    /**
     * @param Extension|Generator                $generator
     * @param int                                $maxRetries
     * @param array<string, array<string, null>> $uniques
     */
    public function __construct($generator, $maxRetries = 10000, &$uniques = [])
    {
        $this->generator = $generator;
        $this->maxRetries = $maxRetries;
        $this->uniques = &$uniques;
    }

    public function ext(string $id)
    {
        return new self($this->generator->ext($id), $this->maxRetries, $this->uniques);
    }

    /**
     * Returns a ChanceGenerator that wraps this UniqueGenerator.
     *
     * This ensures that chaining unique()->optional() works correctly
     * by having ChanceGenerator delegate back to UniqueGenerator for
     * actual value generation, rather than bypassing uniqueness tracking.
     *
     * @param float $weight  A probability between 0 and 1, 0 means that we always get the default value.
     * @param mixed $default The default value to return when the random check fails.
     *
     * @return ChanceGenerator
     */
    public function optional(float $weight = 0.5, $default = null)
    {
        if ($weight > 1) {
            trigger_deprecation('fakerphp/faker', '1.16', 'First argument ($weight) to method "optional()" must be between 0 and 1. You passed %f, we assume you meant %f.', $weight, $weight / 100);
            $weight /= 100;
        }

        return new ChanceGenerator($this, $weight, $default);
    }

    /**
     * Returns a ValidGenerator that wraps this UniqueGenerator.
     *
     * This ensures that chaining unique()->valid() works correctly
     * by having ValidGenerator delegate back to UniqueGenerator for
     * actual value generation.
     *
     * @param \Closure|null $validator  A function returning true for valid values
     * @param int           $maxRetries Maximum number of retries to find a valid value
     *
     * @return ValidGenerator
     */
    public function valid(?\Closure $validator = null, int $maxRetries = 10000)
    {
        return new ValidGenerator($this, $validator, $maxRetries);
    }

    /**
     * Catch and proxy all generator calls but return only unique values
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
     * Catch and proxy all generator calls with arguments but return only unique values
     *
     * @param string $name
     * @param array  $arguments
     */
    public function __call($name, $arguments)
    {
        if (!isset($this->uniques[$name])) {
            $this->uniques[$name] = [];
        }
        $i = 0;

        do {
            $res = call_user_func_array([$this->generator, $name], $arguments);
            ++$i;

            if ($i > $this->maxRetries) {
                throw new \OverflowException(sprintf('Maximum retries of %d reached without finding a unique value', $this->maxRetries));
            }
        } while (array_key_exists(serialize($res), $this->uniques[$name]));
        $this->uniques[$name][serialize($res)] = null;

        return $res;
    }
}
