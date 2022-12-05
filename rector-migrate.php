<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Transform\Rector\Assign\PropertyFetchToMethodCallRector;
use Rector\Transform\ValueObject\PropertyFetchToMethodCall;

// This file configures rector/rector to replace all deprecated property usages with their equivalent functions.
return static function (RectorConfig $rectorConfig): void {
    $properties = [
        'boolean',
        'city',
        'dateTime',
        'dateTimeThisYear',
        'email',
        'firstName',
        'firstNameFemale',
        'lastName',
        'name',
        'password',
        'phoneNumber',
        'sentence',
        'sha256',
        'slug',
        'text',
        'url',
        'word',
        'words',
    ];

    $methodCalls = [];

    foreach ($properties as $property) {
        $methodCalls[] = new PropertyFetchToMethodCall(Generator::class, $property, $property);
    }

    $rectorConfig->ruleWithConfiguration(
        PropertyFetchToMethodCallRector::class,
        $methodCalls
    );
};
