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

use Faker\Provider\UserAgent;
use Faker\Test\TestCase;

final class UserAgentTest extends TestCase
{
    public function testRandomUserAgent()
    {
        self::assertNotNull(UserAgent::userAgent());
    }

    public function testFirefoxUserAgent()
    {
        self::assertStringContainsString(' Firefox/', UserAgent::firefox());
    }

    public function testSafariUserAgent()
    {
        self::assertStringContainsString('Safari/', UserAgent::safari());
    }

    public function testInternetExplorerUserAgent()
    {
        self::assertStringStartsWith('Mozilla/5.0 (compatible; MSIE ', UserAgent::internetExplorer());
    }

    public function testOperaUserAgent()
    {
        self::assertStringStartsWith('Opera/', UserAgent::opera());
    }

    public function testChromeUserAgent()
    {
        self::assertStringContainsString('(KHTML, like Gecko) Chrome/', UserAgent::chrome());
    }
}
