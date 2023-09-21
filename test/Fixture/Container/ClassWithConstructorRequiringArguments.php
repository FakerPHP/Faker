<?php

declare(strict_types=1);

namespace Faker\Test\Fixture\Container;

final class ClassWithConstructorRequiringArguments
{
    public function __construct(\stdClass $required)
    {
    }
}
