<?php

declare(strict_types=1);

namespace Faker\Test\Provider\fr_FR;

use Faker\Provider\fr_FR\Color;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class ColorTest extends TestCase
{
    public function testColorName(): void
    {
        self::assertEquals('Blé', $this->faker->colorName());
        self::assertEquals('Vermillon', $this->faker->colorName());
    }

    public function testSafeColorName(): void
    {
        self::assertEquals('citron', $this->faker->safeColorName());
        self::assertEquals('marine', $this->faker->safeColorName());
    }

    protected function getProviders(): iterable
    {
        yield new Color($this->faker);
    }
}
