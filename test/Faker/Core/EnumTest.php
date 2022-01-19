<?php

declare(strict_types=1);

namespace Faker\Test\Core;

use Faker\Test\Fixture\Enum\Suit;
use Faker\Test\TestCase;
use Faker\UniqueGenerator;

/**
 * @requires PHP 8.1
 */
final class EnumTest extends TestCase
{
    public function testBloodRh(): void
    {
        $faker = new UniqueGenerator($this->faker);
        $generated = [];
        $cases = Suit::cases();

        foreach ($cases as $case) {
            $generated[] = $faker->enum(Suit::class);
        }

        self::assertContainsOnlyInstancesOf(Suit::class, $generated);
        self::assertEqualsCanonicalizing($this->getNames($generated), $this->getNames($cases));
    }

    /**
     * @param Suit[] $suits
     * @return string[]
     */
    private function getNames(array $suits): array
    {
        return array_map(static function (Suit $suit) {
            return $suit->name;
        }, $suits);
    }
}
