<?php

declare(strict_types=1);

namespace Faker\UnitedStates;

use Faker\Core\Extension\AddressExtension;
use Faker\Core\Extension\GeneratorAwareExtension;
use Faker\Core\Extension\GeneratorAwareExtensionTrait;
use Faker\Core\Extension\Helper;

final class Address implements AddressExtension, GeneratorAwareExtension
{
    use GeneratorAwareExtensionTrait;

    /**
     * @var string[]
     */
    private array $addressFormats = [
        "{{Faker\UnitedStates\Address->streetAddress}}\n{{Faker\UnitedStates\Address->city}}, {{Faker\UnitedStates\Address->stateAbbr}} {{Faker\UnitedStates\Address->postcode}}",
    ];

    /**
     * @var string[]
     */
    private array $cityFormats = [
        '{{Faker\UnitedStates\Address->cityPrefix}} {{Faker\UnitedStates\Person->firstName}}{{Faker\UnitedStates\Address->citySuffix}}',
        '{{Faker\UnitedStates\Address->cityPrefix}} {{Faker\UnitedStates\Person->firstName}}',
        '{{Faker\UnitedStates\Person->firstName}}{{Faker\UnitedStates\Address->citySuffix}}',
        '{{Faker\UnitedStates\Person->lastName}}{{Faker\UnitedStates\Address->citySuffix}}',
    ];

    /**
     * @var string[]
     */
    private array $streetSuffix = [
        'Alley', 'Avenue', 'Branch', 'Bridge', 'Brook', 'Brooks', 'Burg', 'Burgs', 'Bypass', 'Camp', 'Canyon', 'Cape', 'Causeway', 'Center', 'Centers', 'Circle', 'Circles', 'Cliff', 'Cliffs', 'Club', 'Common', 'Corner', 'Corners', 'Course', 'Court', 'Courts', 'Cove', 'Coves', 'Creek', 'Crescent', 'Crest', 'Crossing', 'Crossroad', 'Curve', 'Dale', 'Dam', 'Divide', 'Drive', 'Drive', 'Drives', 'Estate', 'Estates', 'Expressway', 'Extension', 'Extensions', 'Fall', 'Falls', 'Ferry', 'Field', 'Fields', 'Flat', 'Flats', 'Ford', 'Fords', 'Forest', 'Forge', 'Forges', 'Fork', 'Forks', 'Fort', 'Freeway', 'Garden', 'Gardens', 'Gateway', 'Glen', 'Glens', 'Green', 'Greens', 'Grove', 'Groves', 'Harbor', 'Harbors', 'Haven', 'Heights', 'Highway', 'Hill', 'Hills', 'Hollow', 'Inlet', 'Inlet', 'Island', 'Island', 'Islands', 'Islands', 'Isle', 'Isle', 'Junction', 'Junctions', 'Key', 'Keys', 'Knoll', 'Knolls', 'Lake', 'Lakes', 'Land', 'Landing', 'Lane', 'Light', 'Lights', 'Loaf', 'Lock', 'Locks', 'Locks', 'Lodge', 'Lodge', 'Loop', 'Mall', 'Manor', 'Manors', 'Meadow', 'Meadows', 'Mews', 'Mill', 'Mills', 'Mission', 'Mission', 'Motorway', 'Mount', 'Mountain', 'Mountain', 'Mountains', 'Mountains', 'Neck', 'Orchard', 'Oval', 'Overpass', 'Park', 'Parks', 'Parkway', 'Parkways', 'Pass', 'Passage', 'Path', 'Pike', 'Pine', 'Pines', 'Place', 'Plain', 'Plains', 'Plains', 'Plaza', 'Plaza', 'Point', 'Points', 'Port', 'Port', 'Ports', 'Ports', 'Prairie', 'Prairie', 'Radial', 'Ramp', 'Ranch', 'Rapid', 'Rapids', 'Rest', 'Ridge', 'Ridges', 'River', 'Road', 'Road', 'Roads', 'Roads', 'Route', 'Row', 'Rue', 'Run', 'Shoal', 'Shoals', 'Shore', 'Shores', 'Skyway', 'Spring', 'Springs', 'Springs', 'Spur', 'Spurs', 'Square', 'Square', 'Squares', 'Squares', 'Station', 'Station', 'Stravenue', 'Stravenue', 'Stream', 'Stream', 'Street', 'Street', 'Streets', 'Summit', 'Summit', 'Terrace', 'Throughway', 'Trace', 'Track', 'Trafficway', 'Trail', 'Trail', 'Tunnel', 'Tunnel', 'Turnpike', 'Turnpike', 'Underpass', 'Union', 'Unions', 'Valley', 'Valleys', 'Via', 'Viaduct', 'View', 'Views', 'Village', 'Village', 'Villages', 'Ville', 'Vista', 'Vista', 'Walk', 'Walks', 'Wall', 'Way', 'Ways', 'Well', 'Wells',
    ];

    /**
     * @var string[]
     */
    private array $streetNameFormats = [
        '{{Faker\UnitedStates\Person->firstName}} {{Faker\UnitedStates\Address->streetSuffix}}',
        '{{Faker\UnitedStates\Person->lastName}} {{Faker\UnitedStates\Address->streetSuffix}}',
    ];

    /**
     * @var string[]
     */
    private array $streetAddressFormats = [
        '{{Faker\UnitedStates\Address->buildingNumber}} {{Faker\UnitedStates\Address->streetName}}',
        '{{Faker\UnitedStates\Address->buildingNumber}} {{Faker\UnitedStates\Address->streetName}} {{Faker\UnitedStates\Address->secondaryAddress}}',
    ];

    /**
     * @var string[]
     */
    private array $buildingNumberFormats = ['%####', '%###', '%##'];

    /**
     * @var string[]
     */
    private array $stateAbbr = [
        'AK', 'AL', 'AR', 'AZ', 'CA', 'CO', 'CT', 'DC', 'DE', 'FL', 'GA', 'HI', 'IA', 'ID', 'IL', 'IN', 'KS', 'KY', 'LA', 'MA', 'MD', 'ME', 'MI', 'MN', 'MO', 'MS', 'MT', 'NC', 'ND', 'NE', 'NH', 'NJ', 'NM', 'NV', 'NY', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VA', 'VT', 'WA', 'WI', 'WV', 'WY',
    ];

    /**
     * @var string[]
     */
    private array $postcode = ['#####', '#####-####'];

    /**
     * @var string[]
     */
    private array $secondaryAddressFormats = ['Apt. ###', 'Suite ###'];

    /**
     * @var string[]
     */
    private array $state = [
        'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming',
    ];

    /**
     * @var string[]
     */
    private array $cityPrefix = ['North', 'East', 'West', 'South', 'New', 'Lake', 'Port'];

    /**
     * @var string[]
     */
    private array $citySuffix = ['town', 'ton', 'land', 'ville', 'berg', 'burgh', 'borough', 'bury', 'view', 'port', 'mouth', 'stad', 'furt', 'chester', 'mouth', 'fort', 'haven', 'side', 'shire'];

    public function address(): string
    {
        $format = Helper::randomElement($this->addressFormats);

        return $this->generator->parse($format);
    }

    public function city(): string
    {
        $format = Helper::randomElement($this->cityFormats);

        return $this->generator->parse($format);
    }

    public function postcode(): string
    {
        return Helper::bothify(Helper::randomElement($this->postcode));
    }

    public function streetName(): string
    {
        $format = Helper::randomElement($this->streetNameFormats);

        return $this->generator->parse($format);
    }

    public function streetAddress(): string
    {
        $format = Helper::randomElement($this->streetAddressFormats);

        return $this->generator->parse($format);
    }

    public function buildingNumber(): string
    {
        return strtoupper(Helper::bothify($this->buildingNumberFormats[array_rand($this->buildingNumberFormats)]));
    }

    public function streetSuffix(): string
    {
        return Helper::randomElement($this->streetSuffix);
    }

    /**
     * @example 'town'
     */
    public function citySuffix(): string
    {
        return Helper::randomElement($this->citySuffix);
    }

    /**
     * @example 'East'
     */
    public function cityPrefix(): string
    {
        return Helper::randomElement($this->cityPrefix);
    }

    /**
     * @example 'Appt. 350'
     */
    public function secondaryAddress(): string
    {
        return Helper::numerify(Helper::randomElement($this->secondaryAddressFormats));
    }

    /**
     * @example 'California'
     */
    public function state(): string
    {
        return Helper::randomElement($this->state);
    }

    /**
     * @example 'CA'
     */
    public function stateAbbr(): string
    {
        return Helper::randomElement($this->stateAbbr);
    }
}
