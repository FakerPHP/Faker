<?php

declare(strict_types=1);

namespace Faker\Test\Fixture\Extension;

use Faker\Extension;

final class FooExtension implements Extension\Extension
{
    public function __construct(BarExtension $barExtension)
    {
    }
}
