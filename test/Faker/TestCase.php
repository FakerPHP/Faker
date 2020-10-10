<?php
namespace Faker\Test;

use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\RegularExpression;
use PHPUnit\Framework\ExpectationFailedException;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * This method has been originally created in phpunit 9 and replaces the predecessor `assertRegExp`. It's defined
     * here in order to be compatible with older phpunit versions.
     *
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
     * This method has been originally created in phpunit 9 and replaces the predecessor `assertNotRegExp`. It's defined
     * here in order to be compatible with older phpunit versions.
     *
     * Asserts that a string does not match a given regular expression.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertDoesNotMatchRegularExpression(
        string $pattern,
        string $string,
        string $message = ''
    ): void {
        static::assertThat(
            $string,
            new LogicalNot(
                new RegularExpression($pattern)
            ),
            $message
        );
    }
}