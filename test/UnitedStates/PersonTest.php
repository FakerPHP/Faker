<?php

declare(strict_types=1);

namespace Faker\Test\UnitedStates;

use Faker\Core\Extension\PersonExtension;
use Faker\Factory;
use Faker\UnitedStates\Person;
use PHPUnit\Framework\TestCase;

final class PersonTest extends TestCase
{
    private Person $extension;

    protected function setUp(): void
    {
        $faker = Factory::default();
        $faker->seed(1);
        $this->extension = $faker->ext(PersonExtension::class);
        parent::setUp();
    }

    public function testName(): void
    {
        $value = $this->extension->name();
        self::assertEquals('Joy Schultz', $value);

        $valueMale = $this->extension->name(PersonExtension::GENDER_MALE);
        self::assertEquals('Mallory Bode', $valueMale);

        $valueFemale = $this->extension->name(PersonExtension::GENDER_FEMALE);
        self::assertEquals('Maribel Kiehn PhD', $valueFemale);
    }

    public function testFirstName(): void
    {
        $value = $this->extension->firstName();
        self::assertEquals('Harmony', $value);

        $valueMale = $this->extension->firstName(PersonExtension::GENDER_MALE);
        self::assertEquals('Kale', $valueMale);

        $valueFemale = $this->extension->firstName(PersonExtension::GENDER_FEMALE);
        self::assertEquals('Lenna', $valueFemale);
    }

    public function testFirstNameMale(): void
    {
        $valueMale = $this->extension->firstName(PersonExtension::GENDER_MALE);
        self::assertEquals('Gage', $valueMale);
    }

    public function testFirstNameFemale(): void
    {
        $valueMale = $this->extension->firstName(PersonExtension::GENDER_FEMALE);
        self::assertEquals('Taya', $valueMale);
    }

    public function testLastName(): void
    {
        $value = $this->extension->lastName();
        self::assertEquals('Wolff', $value);
    }

    public function testTitle(): void
    {
        $value = $this->extension->title();
        self::assertEquals('Prof.', $value);

        $valueMale = $this->extension->title(PersonExtension::GENDER_MALE);
        self::assertEquals('Prof.', $valueMale);

        $valueFemale = $this->extension->title(PersonExtension::GENDER_FEMALE);
        self::assertEquals('Dr.', $valueFemale);
    }

    public function testTitleMale(): void
    {
        $valueMale = $this->extension->titleMale();
        self::assertEquals('Dr.', $valueMale);
    }

    public function testTitleFemale(): void
    {
        $valueMale = $this->extension->titleFemale();
        self::assertEquals('Mrs.', $valueMale);
    }

    // @todo ssn
}
