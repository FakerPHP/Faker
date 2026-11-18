<?php

declare(strict_types=1);

namespace Faker\Test\Provider\gl_ES;

use Faker\Provider\gl_ES\Address;
use Faker\Provider\gl_ES\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testPostcodeBelongsToAGalicianProvince(): void
    {
        self::assertMatchesRegularExpression('/^(15|27|32|36)[0-9]{3}$/', $this->faker->postcode());
    }

    public function testStateIsAGalicianProvince(): void
    {
        self::assertContains($this->faker->state(), ['A Coruña', 'Lugo', 'Ourense', 'Pontevedra']);
    }

    public function testCityIsNotEmpty(): void
    {
        self::assertNotEmpty($this->faker->city());
    }

    public function testAddressIsSingleLine(): void
    {
        $address = $this->faker->address();

        self::assertStringNotContainsString("\n", $address);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);

        yield new Person($this->faker);
    }
}
