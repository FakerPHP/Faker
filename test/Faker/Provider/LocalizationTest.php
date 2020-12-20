<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider;

use Faker\Factory;
use Faker\Test\TestCase;

final class LocalizationTest extends TestCase
{
    /**
     * @dataProvider localeDataProvider
     */
    public function testLocalizedProvidersDoNotThrowErrors(string $locale): void
    {
        $faker = Factory::create($locale);
        self::assertNotNull($faker->name, 'Localized Name Provider ' . $locale . ' does not throw errors');
        self::assertNotNull($faker->address, 'Localized Address Provider ' . $locale . ' does not throw errors');
    }
}
