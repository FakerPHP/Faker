<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Test\Provider\kk_KZ;

use Faker\Provider\kk_KZ\Company;
use Faker\Test\TestCase;

final class CompanyTest extends TestCase
{
    public function testBusinessIdentificationNumberIsValid()
    {
        $registrationDate             = new \DateTime('now');
        $businessIdentificationNumber = $this->faker->businessIdentificationNumber($registrationDate);
        $registrationDateAsString     = $registrationDate->format('ym');

        self::assertMatchesRegularExpression(
            '/^(' . $registrationDateAsString . ')([4-6]{1})([0-3]{1})(\\d{6})$/',
            $businessIdentificationNumber
        );
    }


    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
