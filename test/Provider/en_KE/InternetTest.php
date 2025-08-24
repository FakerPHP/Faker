<?php

declare(strict_types=1);

namespace Faker\Provider\en_KE;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class InternetTest extends TestCase
{
    public function testDomainNameHasValidTld(): void
    {
        $domain = $this->faker->domainName();

        self::assertNotEmpty($domain);
        self::assertIsString($domain);

        $tlds = (new \ReflectionClass(Internet::class))->getStaticPropertyValue('tld');

        $found = false;
        foreach ($tlds as $tld) {
            if (str_ends_with($domain, '.' . $tld)) {
                $found = true;
                break;
            }
        }

        self::assertTrue($found, 'Domain name should end with a valid Kenyan TLD');
    }

    public function testFreeEmailHasValidDomain(): void
    {
        $email = $this->faker->freeEmail();

        self::assertNotEmpty($email);
        self::assertIsString($email);

        $freeEmailDomains = (new \ReflectionClass(Internet::class))->getStaticPropertyValue('freeEmailDomain');

        $domain = substr(strrchr($email, '@'), 1);
        self::assertContains($domain, $freeEmailDomains, 'Free email domain should be one of the Kenyan free email domains');
    }

    public function testCompanyEmailHasValidIspDomain(): void
    {
        $email = $this->faker->companyEmail();

        self::assertNotEmpty($email);
        self::assertIsString($email);

        $ispDomains = (new \ReflectionClass(Internet::class))->getStaticPropertyValue('ispDomains');

        $domain = substr(strrchr($email, '@'), 1);
        self::assertContains($domain, $ispDomains, 'Company email domain should be one of the Kenyan ISP domains');
    }

    public function testFreeEmailIsValid(): void
    {
        $email = $this->faker->freeEmail();

        self::assertNotEmpty($email);
        self::assertIsString($email);

        // Validate email format
        self::assertMatchesRegularExpression(
            '/^[^\s@]+@[^\s@]+\.[^\s@]+$/',
            $email,
            'freeEmail() should return a valid email address'
        );

        // Check domain is in known free email domains
        $freeEmailDomains = (new \ReflectionClass(Internet::class))->getStaticPropertyValue('freeEmailDomain');
        $domain = substr(strrchr($email, '@'), 1);

        self::assertContains(
            $domain,
            $freeEmailDomains,
            'Free email domain should be one of the known free email domains'
        );
    }


    protected function getProviders(): iterable
    {
        yield new \Faker\Provider\Person($this->faker);
        yield new Internet($this->faker);
    }
}
