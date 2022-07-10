<?php

namespace Faker\English\US;

use Faker\Core\Extension\AddressExtension;
use Faker\Core\Extension\PersonExtension;
use Faker\English\Factory;
use PHPUnit\Framework\TestCase;

final class PersonTest extends TestCase
{
    private Person $extension;

    protected function setUp(): void
    {
        $faker = Factory::unitedStates();
        $faker->seed(1);
        $this->extension = $faker->ext(PersonExtension::class);
        parent::setUp();
    }

    public function testSuffix(): void
    {
        $value = $this->extension->suffix();
        self::assertEquals('Sr.', $value);
        $value = $this->extension->suffix();
        self::assertEquals('I', $value);
    }

    public function testSsn(): void
    {
        for ($i = 0; $i < 100; ++$i) {
            $number = $this->extension->ssn();

            // should be in the format ###-##-####
            self::assertMatchesRegularExpression('/^[0-9]{3}-[0-9]{2}-[0-9]{4}$/', $number);

            $parts = explode('-', $number);

            // first part must be between 001 and 899, excluding 666
            self::assertNotEquals(666, $parts[0]);
            self::assertGreaterThan(0, $parts[0]);
            self::assertLessThan(900, $parts[0]);

            // second part must be between 01 and 99
            self::assertGreaterThan(0, $parts[1]);
            self::assertLessThan(100, $parts[1]);

            // the third part must be between 0001 and 9999
            self::assertGreaterThan(0, $parts[2]);
            self::assertLessThan(10000, $parts[2]);
        }
    }

    public function testName(): void
    {
        $value = $this->extension->name();
        self::assertEquals('Joy Schultz', $value);

        $valueMale = $this->extension->name(PersonExtension::GENDER_MALE);
        self::assertEquals('Rex Dietrich Sr.', $valueMale);

        $valueFemale = $this->extension->name(PersonExtension::GENDER_FEMALE);
        self::assertEquals('Rubye Cole', $valueFemale);
    }

    public function testFirstName(): void
    {
        $value = $this->extension->firstName();
        self::assertEquals('Marlene', $value);

        $valueMale = $this->extension->firstName(PersonExtension::GENDER_MALE);
        self::assertEquals('Marshall', $valueMale);

        $valueFemale = $this->extension->firstName(PersonExtension::GENDER_FEMALE);
        self::assertEquals('Lenna', $valueFemale);
    }

    public function testFirstNameMale(): void
    {
        $value = $this->extension->firstNameMale();
        self::assertEquals('Dedrick', $value);
        $value = $this->extension->firstNameMale();
        self::assertEquals('Laron', $value);
    }

    public function testFirstNameFemale(): void
    {
        $value = $this->extension->firstNameFemale();
        self::assertEquals('Haylie', $value);
        $value = $this->extension->firstNameFemale();
        self::assertEquals('Marlene', $value);
    }

    public function testLastName(): void
    {
        $value = $this->extension->lastName();
        self::assertEquals('Torphy', $value);
        $value = $this->extension->lastName();
        self::assertEquals('Jacobi', $value);
    }

    public function testTitle(): void
    {
        $value = $this->extension->title();
        self::assertEquals('Miss', $value);

        $value = $this->extension->title(PersonExtension::GENDER_MALE);
        self::assertEquals('Mr.', $value);

        $value = $this->extension->title(PersonExtension::GENDER_FEMALE);
        self::assertEquals('Dr.', $value);
    }

    public function testTitleMale(): void
    {
        $value = $this->extension->titleMale();
        self::assertEquals('Mr.', $value);
        $value = $this->extension->titleMale();
        self::assertEquals('Dr.', $value);
    }

    public function testTitleFemale(): void
    {
        $value = $this->extension->titleFemale();
        self::assertEquals('Mrs.', $value);
        $value = $this->extension->titleFemale();
        self::assertEquals('Miss', $value);
    }
}
