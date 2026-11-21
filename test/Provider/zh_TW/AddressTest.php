<?php

declare(strict_types=1);

namespace Faker\Test\Provider\zh_TW;

use Faker\Provider\zh_TW\Address;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testAdministrativeDistrictNamesAreCurrent(): void
    {
        $city = $this->getCityData();

        self::assertContains('頭份市', $city['苗栗縣']);
        self::assertNotContains('頭份鎮', $city['苗栗縣']);

        self::assertContains('員林市', $city['彰化縣']);
        self::assertNotContains('員林鎮', $city['彰化縣']);

        self::assertContains('中西區', $city['臺南市']);
        self::assertNotContains('中區', $city['臺南市']);
        self::assertNotContains('西區', $city['臺南市']);

        self::assertContains('那瑪夏區', $city['高雄市']);
    }

    public function testAdministrativeDistrictNamesAreUniqueWithinEachCounty(): void
    {
        foreach ($this->getCityData() as $county => $districts) {
            self::assertSame(
                $districts,
                array_values(array_unique($districts)),
                sprintf('%s contains duplicate administrative districts.', $county),
            );
        }
    }

    /**
     * @return array<string, list<string>>
     */
    private function getCityData(): array
    {
        $reflection = new \ReflectionClass(Address::class);
        $property = $reflection->getProperty('city');
        $property->setAccessible(true);

        return $property->getValue();
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
