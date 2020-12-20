<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\ru_RU;

use Faker\Test\TestCase;

final class TextTest extends TestCase
{
    private $textClass;

    protected function setUp(): void
    {
        $this->textClass = new \ReflectionClass('Faker\Provider\ru_RU\Text');
    }

    protected function getMethod($name)
    {
        $method = $this->textClass->getMethod($name);

        $method->setAccessible(true);

        return $method;
    }

    public function testItShouldAppendEndPunctToTheEndOfString()
    {
        self::assertSame(
            'На другой день Чичиков отправился на обед и вечер.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['На другой день Чичиков отправился на обед и вечер '])
        );

        self::assertSame(
            'На другой день Чичиков отправился на обед и вечер.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['На другой день Чичиков отправился на обед и вечер—'])
        );

        self::assertSame(
            'На другой день Чичиков отправился на обед и вечер.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['На другой день Чичиков отправился на обед и вечер,'])
        );

        self::assertSame(
            'На другой день Чичиков отправился на обед и вечер!.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['На другой день Чичиков отправился на обед и вечер! '])
        );

        self::assertSame(
            'На другой день Чичиков отправился на обед и вечер.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['На другой день Чичиков отправился на обед и вечер; '])
        );

        self::assertSame(
            'На другой день Чичиков отправился на обед и вечер.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['На другой день Чичиков отправился на обед и вечер: '])
        );
    }
}
