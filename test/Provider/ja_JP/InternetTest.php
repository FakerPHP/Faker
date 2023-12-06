<?php

declare(strict_types=1);

namespace Faker\Test\Provider\ja_JP;

use Faker\Provider\ja_JP\Internet;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class InternetTest extends TestCase
{
    public function testUserName(): void
    {
        self::assertEquals('nanami.takahashi', $this->faker->userName);
    }

    public function testDomainName(): void
    {
        self::assertEquals('yamamoto.jp', $this->faker->domainName);
    }

    protected function getProviders(): iterable
    {
        yield new Internet($this->faker);
    }
}
