<?php

declare(strict_types=1);

namespace Faker\Core;

use Faker\Extension;

/**
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class Enum implements Extension\EnumExtension
{
    public function enum(string $enumClass): \UnitEnum
    {
        if (!enum_exists($enumClass)) {
            throw new \InvalidArgumentException(sprintf('"%s" is not an enum.', $enumClass));
        }

        $cases = $enumClass::cases();

        if (0 === count($cases)) {
            throw new \InvalidArgumentException(sprintf('Enum "%s" does not have any cases', $enumClass));
        }

        return Extension\Helper::randomElement($cases);
    }
}
