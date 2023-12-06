<?php

declare(strict_types=1);

namespace Faker\Test\Provider\pl_PL;

use Faker\Provider\pl_PL\Color;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class ColorTest extends TestCase
{
    public function testColorName(): void
    {
        self::assertEquals('sepia', $this->faker->colorName());
        self::assertEquals('kawowy', $this->faker->colorName());
    }

    public function testSafeColorName(): void
    {
        self::assertEquals('fioletowy', $this->faker->safeColorName());
        self::assertEquals('złoty', $this->faker->safeColorName());
    }

    protected function getProviders(): iterable
    {
        yield new Color($this->faker);
    }
}
