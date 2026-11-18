<?php

declare(strict_types=1);

namespace Faker\Provider\en_CA;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    /**
     * Test the validity of SIN
     */
    public function testSin(): void
    {
        $sin = $this->faker->sin();
        self::assertNotEmpty($sin);
        self::assertIsString($sin);
        self::assertMatchesRegularExpression('/^[1-79]\d{2}-\d{3}-\d{3}$/', $sin);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
