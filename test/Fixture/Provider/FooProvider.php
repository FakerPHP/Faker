<?php

declare(strict_types=1);

namespace Faker\Test\Fixture\Provider;

final class FooProvider
{
    public function fooFormatter()
    {
        return 'foobar';
    }

    public function fooFormatterWithArguments($value = '')
    {
        return 'baz' . $value;
    }

    // The PHP CS Fixer `protected_to_private` fixer rule rewrites this to `private function`
    /*
    protected function protectedFormatter()
    {
        return 'protected';
    }
    */

    private function privateFormatter()
    {
        return 'private';
    }

    public function maybeShadowedFormatter()
    {
        return 'not shadowed';
    }

    public function maybeShadowedFormatter2()
    {
        return 'also not shadowed';
    }
}
