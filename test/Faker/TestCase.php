<?php

namespace Faker\Test;

use Faker\Generator;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\RegularExpression;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @var Generator
     */
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = new Generator();
        $this->faker->seed(1);

        foreach ($this->getProviders() as $provider) {
            $this->faker->addProvider($provider);
        }
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertMatchesRegularExpression(string $pattern, string $string, string $message = ''): void
    {
        static::assertThat($string, new RegularExpression($pattern), $message);
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertDoesNotMatchRegularExpression(string $pattern, string $string, string $message = ''): void
    {
        static::assertThat(
            $string,
            new LogicalNot(
                new RegularExpression($pattern)
            ),
            $message
        );
    }

    public static function localeDataProvider(): array
    {
        return array_map(function ($locale) {
            return [$locale];
        }, self::getAllLocales());
    }

    protected static function getAllLocales(): array
    {
        static $locales = [];

        if (!empty($locales)) {
            return $locales;
        }

        // Finding all PHP files in the xx_XX directories
        $providerDir = __DIR__ . '/../../src/Faker/Provider';
        foreach (glob($providerDir . '/*_*/*.php') as $file) {
            $localisation = basename(dirname($file));

            if (isset($locales[$localisation])) {
                continue;
            }

            $locales[$localisation] = $localisation;
        }

        return $locales;
    }

    protected function loadLocalProvider(string $locale, string $provider): void
    {
        $providerClass = "Faker\\Provider\\$locale\\$provider";

        if (class_exists($providerClass)) {
            $this->faker->addProvider(new $providerClass($this->faker));
        }
    }

    protected function getProviders(): iterable
    {
        return [];
    }
}
