<?php

declare(strict_types=1);

namespace Faker;

use Faker\Core\Container\ContainerBuilder;
use Faker\Core\DefaultGenerator;
use Faker\Core\Extension;
use Faker\UnitedStates\Address;
use Faker\UnitedStates\Company;
use Faker\UnitedStates\Country;
use Faker\UnitedStates\Person;
use Faker\UnitedStates\PhoneNumber;

class Factory
{
    public static function default(): DefaultGenerator
    {
        $builder = self::getBuilder();

        // Add specific extensions for The Netherlands to replace some default ones
        $builder->add(Address::class, Extension\AddressExtension::class);
        $builder->add(Country::class, Extension\CountryExtension::class);
        $builder->add(Company::class, Extension\CompanyExtension::class);
        $builder->add(Person::class, Extension\PersonExtension::class);
        $builder->add(PhoneNumber::class, Extension\PhoneNumberExtension::class);

        $builder->add(Address::class);
        $builder->add(Company::class);
        $builder->add(Person::class);
        $builder->add(PhoneNumber::class);


        return new DefaultGenerator($builder->build());
    }

    private static function getBuilder(): ContainerBuilder
    {
        $builder = new ContainerBuilder();

        foreach (ContainerBuilder::defaultExtensions() as $id => $definition) {
            $builder->add($id, $definition);
        }

        return $builder;
    }
}
