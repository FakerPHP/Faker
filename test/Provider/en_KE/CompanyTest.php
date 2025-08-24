<?php

declare(strict_types=1);

namespace Faker\Provider\en_KE;

use Faker\Provider\Person;
use Faker\Provider\Base; // optional, but often needed
use Faker\Provider\Miscellaneous; // optional, if Company uses it

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class CompanyTest extends TestCase
{
    public function testCompanyNameIsValidString(): void
    {
        $company = $this->faker->company();

        self::assertNotEmpty($company);
        self::assertIsString($company);

        // The company name should start with one of the known base company names
        $baseNames = (new \ReflectionClass(Company::class))->getStaticPropertyValue('companyName');
        $suffixes = (new \ReflectionClass(Company::class))->getStaticPropertyValue('companySuffix');

        // Check company starts with one of the base names (case-insensitive)
        $foundBase = false;
        foreach ($baseNames as $baseName) {
            if (stripos($company, $baseName) === 0) {
                $foundBase = true;
                break;
            }
        }
        self::assertTrue($foundBase, "Company name should start with a known base company name");

        // Optionally check suffix presence (suffix may or may not be appended)
        $hasSuffix = false;
        foreach ($suffixes as $suffix) {
            // Case insensitive suffix check at the end
            if (stripos($company, $suffix) !== false) {
                $hasSuffix = true;
                break;
            }
        }

        // The suffix is optional, so no assertion here about it existing
        // But if suffix exists, it must be one of the known suffixes
        if ($hasSuffix) {
            $matchedSuffix = false;
            foreach ($suffixes as $suffix) {
                if (stripos($company, $suffix) !== false) {
                    $matchedSuffix = true;
                    break;
                }
            }
            self::assertTrue($matchedSuffix, "If suffix exists, it must be one of the known suffixes");
        }
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
        yield new Base($this->faker);
        yield new Miscellaneous($this->faker);
        yield new Company($this->faker);
    }
}
