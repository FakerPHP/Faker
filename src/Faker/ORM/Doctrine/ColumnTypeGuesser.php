<?php

namespace Faker\ORM\Doctrine;

use Faker\Generator;

class ColumnTypeGuesser
{
    protected $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @return \Closure|null
     */
    public function guessFormat($fieldName, $class)
    {
        if (!($class instanceof \Doctrine\Common\Persistence\Mapping\ClassMetadata || $class instanceof \Doctrine\Persistence\Mapping\ClassMetadata)) {
            throw new \InvalidArgumentException(sprintf('Invalid class metadata. Expected "Doctrine\Persistence\Mapping\ClassMetadata" but got "%s"', get_class($class)));
        }

        $generator = $this->generator;
        $type = $class->getTypeOfField($fieldName);

        switch ($type) {
            case 'boolean':
                return static function () use ($generator) {
                    return $generator->boolean;
                };

            case 'decimal':
                $size = $class->fieldMappings[$fieldName]['precision'] ?? 2;

                return static function () use ($generator, $size) {
                    return $generator->randomNumber($size + 2) / 100;
                };

            case 'smallint':
                return static function () use ($generator) {
                    return $generator->numberBetween(0, 65535);
                };

            case 'integer':
                return static function () use ($generator) {
                    return $generator->numberBetween(0, 2147483647);
                };

            case 'bigint':
                return static function () use ($generator) {
                    return $generator->numberBetween(0, PHP_INT_MAX);
                };

            case 'float':
                return static function () use ($generator) {
                    return $generator->randomFloat();
                };

            case 'string':
                $size = $class->fieldMappings[$fieldName]['length'] ?? 255;

                return static function () use ($generator, $size) {
                    return $generator->text($size);
                };

            case 'text':
                return static function () use ($generator) {
                    return $generator->text;
                };

            case 'datetime':
            case 'date':
            case 'time':
                return static function () use ($generator) {
                    return $generator->datetime;
                };

            case 'datetime_immutable':
            case 'date_immutable':
            case 'time_immutable':
                return static function () use ($generator) {
                    return \DateTimeImmutable::createFromMutable($generator->datetime);
                };

            default:
                // no smart way to guess what the user expects here
                return null;
        }
    }
}
