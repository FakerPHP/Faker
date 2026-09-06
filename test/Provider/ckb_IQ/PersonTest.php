<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ckb_IQ;

use Faker\Provider\ckb_IQ\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testFirstNameMale(): void
    {
        $firstName = $this->faker->firstNameMale();
        self::assertNotEmpty($firstName);
        self::assertMatchesRegularExpression('/\p{Arabic}/u', $firstName);
    }

    public function testFirstNameFemale(): void
    {
        $firstName = $this->faker->firstNameFemale();
        self::assertNotEmpty($firstName);
        self::assertMatchesRegularExpression('/\p{Arabic}/u', $firstName);
    }

    public function testLastName(): void
    {
        $lastName = $this->faker->lastName();
        self::assertNotEmpty($lastName);
        self::assertMatchesRegularExpression('/\p{Arabic}/u', $lastName);
    }

    public function testName(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $name = $this->faker->name();
            self::assertNotEmpty($name);
            self::assertMatchesRegularExpression('/\p{Arabic}/u', $name);
        }
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
