<?php

namespace Faker\Test\Provider\ja_JP;

use Faker\Provider\ja_JP\Internet;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class InternetTest extends TestCase
{
    /**
     * @requires PHP < 8.3
     */
    public function testUserName(): void
    {
        self::assertEquals('akira72', $this->faker->userName);
    }

    /**
     * @requires PHP < 8.3
     */
    public function testDomainName(): void
    {
        self::assertEquals('nakajima.com', $this->faker->domainName);
    }

    protected function getProviders(): iterable
    {
        yield new Internet($this->faker);
    }
}
