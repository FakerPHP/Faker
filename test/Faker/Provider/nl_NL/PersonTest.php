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
            [new \DateTime('2019-11-30'), null, '/^[INDSARB][A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), null, '/^[INDSARB][A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'NI', '/^I[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'NI', '/^I[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PN', '/^N[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PN', '/^N[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PD', '/^D[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PD', '/^D[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PZ', '/^S[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PZ', '/^S[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PB', '/^A[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PB', '/^A[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PV', '/^R[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PV', '/^R[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'ZN', '/^B[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'ZN', '/^B[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'TN', '/^N[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'TN', '/^N[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'TE', '/^B[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'TE', '/^B[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-11-30'), 'PF', '/^N[A-Z][A-Z0-9]{6}[0-9]{1}$/'],
            [new \DateTime('2019-12-01'), 'PF', '/^N[A-Z][A-Z1-9]{6}[0-9]{1}$/'],
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
