<?php

namespace Faker\Test\Provider\nl_NL;

use Faker\Provider\nl_NL\Person;
use Faker\Test\TestCase;

final class PersonTest extends TestCase
{
    public function testGenerateValidIdNumber()
    {
        $idNumber = $this->faker->idNumber();
        self::assertEquals(9, strlen($idNumber));


        $sum = -1 * $idNumber % 10;
        for ($multiplier = 2; $idNumber > 0; $multiplier++) {
            $val = ($idNumber /= 10) % 10;
            $sum += $multiplier * $val;
        }
        self::assertTrue($sum != 0 && $sum % 11 == 0);
    }

    /**
     * @dataProvider identityDocumentNumberProvider
     * @param \DateTime   $issueDate
     * @param string|null $documentCode
     * @param string      $regex
     */
    public function testGenerateValidIdentityDocumentNumber(\DateTime $issueDate, ?string $documentCode, string $regex)
    {
        self::assertMatchesRegularExpression($regex, $this->faker->identityDocumentNumber($issueDate, $documentCode));
    }


    /**
     * @dataProvider validityProvider
     * @param int $age
     * @param int $validity
     */
    public function testGenerateValidIdentityDocumentValidity(int $age, int $validity)
    {
        self::assertSame($validity, $this->faker->identityDocumentValidity($age));
    }

    /**
     * @return array
     */
    public function identityDocumentNumberProvider()
    {
        return [
            [new \DateTime('2019-11-30'), null, '/^[INDSARB]((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), null, '/^[INDSARB]((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'NI', '/^I((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'NI', '/^I((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PN', '/^N((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PN', '/^N((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PD', '/^D((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PD', '/^D((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PZ', '/^S((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PZ', '/^S((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PB', '/^A((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PB', '/^A((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PV', '/^R((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PV', '/^R((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'ZN', '/^B((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'ZN', '/^B((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'TN', '/^N((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'TN', '/^N((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'TE', '/^B((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'TE', '/^B((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PF', '/^N((?![O])[A-Z])((?![O])[A-Z0-9]){6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PF', '/^N((?![O])[A-Z])((?![O])[A-Z1-9]){6}[1-9]{1}$/'],
        ];
    }

    /**
     * @return array
     */
    public function validityProvider()
    {
        return [
            [17, 5],
            [18, 10],
            [19, 10],
        ];
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
