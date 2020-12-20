<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider;

class Medical extends Base
{
    protected static $bloodTypes = ['A', 'AB', 'B', 'O'];

    protected static $bloodRhFactors = ['+', '-'];

    /**
     * @example 'AB'
     */
    public static function bloodType(): string
    {
        return static::randomElement(static::$bloodTypes);
    }

    /**
     * @example '+'
     */
    public static function bloodRh(): string
    {
        return static::randomElement(static::$bloodRhFactors);
    }

    /**
     * @example 'AB+'
     */
    public function bloodGroup(): string
    {
        return $this->generator->parse('{{bloodType}}{{bloodRh}}');
    }
}
