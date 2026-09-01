<?php

namespace Faker\Test\Provider\pl_PL;

use Faker\Provider\pl_PL\Address;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testState(): void
    {
        $state = $this->faker->state();
        self::assertNotEmpty($state);
        self::assertIsString($state);
        self::assertMatchesRegularExpression('/[a-z]+/', $state);
    }

    public function testStreetNamesAreNotPaddedWithWhitespace(): void
    {
        $reflection = new \ReflectionClass(Address::class);
        $streets = $reflection->getProperty('street');
        $streets->setAccessible(true);

        foreach ($streets->getValue() as $street) {
            self::assertSame(trim($street), $street, sprintf('Street name "%s" is padded with whitespace', $street));
        }
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
