<?php

namespace Faker\Extension;

/**
 * @experimental This interface is experimental and does not fall under our BC promise
 */
interface EnumExtension extends Extension
{
    /**
     * @example 'Gender::Male'
     *
     * @template T of UnitEnum
     *
     * @param class-string<T> $enumClass
     *
     * @return T
     */
    public function enum(string $enumClass): \UnitEnum;
}
