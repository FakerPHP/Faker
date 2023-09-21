<?php

declare(strict_types=1);

namespace Faker\Test\Fixture\Container;

final class ClassWithConstructorNotRequiringArguments
{
    public function __construct(\stdClass $optional = null)
    {
    }
}
