<?php

declare(strict_types=1);

namespace Faker\Test\Provider\gl_ES;

use Faker\Provider\gl_ES\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testDNI(): void
    {
        $dni = $this->faker->dni;

        self::assertMatchesRegularExpression('/^[0-9]{8}[A-Z]$/', $dni);
        self::assertSame('TRWAGMYFPDXBNJZSQVHLCKE'[((int) substr($dni, 0, 8)) % 23], substr($dni, -1));
    }

    public function testLicenceCode(): void
    {
        $validLicenceCodes = ['AM', 'A1', 'A2', 'A', 'B', 'B+E', 'C1', 'C1+E', 'C', 'C+E', 'D1', 'D1+E', 'D', 'D+E'];

        self::assertContains($this->faker->licenceCode, $validLicenceCodes);
    }

    public function testNameHasAtLeastOneSurname(): void
    {
        self::assertGreaterThanOrEqual(2, count(explode(' ', $this->faker->name())));
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
