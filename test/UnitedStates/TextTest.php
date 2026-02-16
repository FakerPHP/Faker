<?php

declare(strict_types=1);

namespace Faker\Test\UnitedStates;

use Faker\Core\Extension\TextExtension;
use Faker\Factory;
use Faker\UnitedStates\Text;
use PHPUnit\Framework\TestCase;

final class TextTest extends TestCase
{
    private Text $extension;

    protected function setUp(): void
    {
        $faker = Factory::default();
        $faker->seed(1);
        $this->extension = $faker->ext(TextExtension::class);
        parent::setUp();
    }

    public function testRealText(): void
    {
        $value = $this->extension->realText(0, 100);
        self::assertEquals("the next, and so on.' 'What a pity it wouldn't stay!' sighed the Lory, as soon as it didn't sound at", $value);
    }
}
