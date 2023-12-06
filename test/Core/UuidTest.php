<?php

declare(strict_types=1);

namespace Faker\Test\Core;

use Faker\Core\Number;
use Faker\Core\Uuid;
use Faker\Test\TestCase;

final class UuidTest extends TestCase
{
    public function testUuidReturnsUuid(): void
    {
        $instance = new Uuid(new Number());
        $uuid = $instance->uuid3();
        self::assertTrue($this->isUuid($uuid));
    }

    public function testUuidExpectedSeed(): void
    {
        $instance = new Uuid(new Number());

        if (pack('L', 0x6162797A) == pack('N', 0x6162797A)) {
            self::markTestSkipped('Big Endian');
        }
        $this->faker->seed(123);
        self::assertEquals('b0367973-37c8-3d64-a9e1-24157824df1c', $instance->uuid3());
        self::assertEquals('5e9c5910-6ed8-3a7d-aba4-54f059d3dad3', $instance->uuid3());
    }

    protected function isUuid(string $uuid)
    {
        return is_string($uuid) && (bool) preg_match(
            '/^[a-f0-9]{8,8}-(?:[a-f0-9]{4,4}-){3,3}[a-f0-9]{12,12}$/i',
            $uuid,
        );
    }
}
