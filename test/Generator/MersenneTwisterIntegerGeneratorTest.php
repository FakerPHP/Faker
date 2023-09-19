<?php

declare(strict_types=1);

namespace Faker\Test\Core\Generator;

use Faker\Generator;

use PHPUnit\Framework;

/**
 * @covers \Faker\Generator\MersenneTwisterIntegerGenerator
 */
final class MersenneTwisterIntegerGeneratorTest extends Framework\TestCase
{
    public function testIntegerBetweenRejectsMinimumGreaterThanMaximum(): void
    {
        $minimum = 5;
        $maximum = $minimum - 1;

        $generator = new Generator\MersenneTwisterIntegerGenerator();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf(
            'Minimum value %d should not be greater than the maximum value %d.',
            $minimum,
            $maximum,
        ));

        $generator->integerBetween($minimum, $maximum);
    }

    public function testIntegerBetweenReturnsIntegerBetweenMinimumAndMaximum(): void
    {
        $minimum = 5;
        $maximum = 1000;

        $generator = new Generator\MersenneTwisterIntegerGenerator();

        $values = self::generateValues(
            static function () use ($generator, $minimum, $maximum): int {
                return $generator->integerBetween($minimum, $maximum);
            },
            100,
        );

        self::assertValuesSatisfySpecification(
            static function (int $value) use ($minimum, $maximum): bool {
                return $value >= $minimum && $value <= $maximum;
            },
            $values,
        );
    }

    public function testLargestIntegerReturnsLargestInteger(): void
    {
        $generator = new Generator\MersenneTwisterIntegerGenerator();

        self::assertSame(mt_getrandmax(), $generator->largestInteger());
    }

    public function testSeedSeedsIntegerGenerator(): void
    {
        $value = 9001;

        $generator = new Generator\MersenneTwisterIntegerGenerator();

        $generator->seed($value);

        $first = self::generateValues(
            static function () use ($generator): int {
                return $generator->integer();
            },
            100,
        );

        $generator->seed($value);

        $second = self::generateValues(
            static function () use ($generator): int {
                return $generator->integer();
            },
            100,
        );

        self::assertSame($first, $second);
    }

    /**
     * @param \Closure(): mixed $generator
     *
     * @throws \InvalidArgumentException
     *
     * @return list<mixed>
     */
    private static function generateValues(
        \Closure $generator,
        int $count
    ): array {
        if ($count < 1) {
            throw new \InvalidArgumentException(sprintf(
                'Count needs to be greater than 0, got %d instead',
                $count,
            ));
        }

        return array_map(static function () use ($generator) {
            return $generator();
        }, range(0, $count - 1));
    }

    /**
     * @param \Closure(mixed):bool $specification
     * @param list<mixed>          $values
     *
     * @throws \InvalidArgumentException
     */
    private static function assertValuesSatisfySpecification(
        \Closure $specification,
        array $values
    ): void {
        $invalidValues = array_filter($values, static function ($value) use ($specification): bool {
            return $specification($value) === false;
        });

        self::assertCount(0, $invalidValues, 'Failed asserting that all generated values satisfy the specification.');
    }
}
