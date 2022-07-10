<?php

declare(strict_types=1);

namespace Faker\English;

use Faker\Core\Container\ContainerBuilder;
use Faker\Core\DefaultGenerator;
use Faker\Core\Extension;
use Faker\English\US\Address;
use Faker\English\US\Country;
use Faker\English\US\Person;

class Factory
{
    public static function unitedStates(): DefaultGenerator
    {
        $builder = self::getBuilder();

        $builder->add(Country::class, Extension\CountryExtension::class);
        $builder->add(Country::class);
        $builder->add(Address::class, Extension\AddressExtension::class);
        $builder->add(Address::class);
        $builder->add(Person::class, Extension\PersonExtension::class);
        $builder->add(Person::class);

        return new DefaultGenerator($builder->build());
    }

    private static function getBuilder(): ContainerBuilder
    {
        $builder = new ContainerBuilder();

        foreach (ContainerBuilder::defaultExtensions() as $id => $definition) {
            $builder->add($definition, $id);
        }

        return $builder;
    }
}
