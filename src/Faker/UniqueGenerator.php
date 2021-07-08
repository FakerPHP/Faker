<?php

namespace Faker;

/**
 * Proxy for other generators that returns only unique values.
 *
 * Instantiated through @see Generator::unique().
 *
 * @mixin Generator
 */
class UniqueGenerator
{
    /**
     * @var Generator
     */
    protected $generator;

    /**
     * @var int
     */
    protected $maxRetries;

    /**
     * @var array<string, array<string, null>>
     */
    protected $uniques = [];

    public function __construct(Generator $generator, int $maxRetries = 10000)
    {
        $this->generator = $generator;
        $this->maxRetries = $maxRetries;
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
