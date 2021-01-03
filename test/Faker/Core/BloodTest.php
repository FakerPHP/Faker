<?php

declare(strict_types=1);

namespace Faker\Test\Core;

use Faker\Test\TestCase;

final class BloodTest extends TestCase
{
    public function testBloodType(): void
    {
        $resultSet = [];

        for ($i = 0; $i < 100; ++$i) {
            $resultSet[] = $this->faker->bloodType();
        }

        self::assertContains('A', $resultSet);
        self::assertContains('AB', $resultSet);
        self::assertContains('B', $resultSet);
        self::assertContains('O', $resultSet);
    }

    public function testBloodRh(): void
    {
        $resultSet = [];

        for ($i = 0; $i < 100; ++$i) {
            $resultSet[] = $this->faker->bloodRh();
        }
        self::assertContains('+', $resultSet);
        self::assertContains('-', $resultSet);
    }

    public function testBloodGroup(): void
    {
        $resultSet = [];

        for ($i = 0; $i < 100; ++$i) {
            $resultSet[] = $this->faker->bloodGroup();
        }

        self::assertContains('A+', $resultSet);
        self::assertContains('A-', $resultSet);
        self::assertContains('AB+', $resultSet);
        self::assertContains('AB-', $resultSet);
        self::assertContains('B+', $resultSet);
        self::assertContains('B-', $resultSet);
        self::assertContains('O+', $resultSet);
        self::assertContains('O-', $resultSet);
    }
}
