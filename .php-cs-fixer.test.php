<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->notPath([
        'Fixture/Enum/BackedEnum.php',
    ])
    ->ignoreDotFiles(false)
    ->in(__DIR__ . '/test');

$config = new PhpCsFixer\Config('faker');

if (!is_dir('.build/php-cs-fixer')) {
    mkdir('.build/php-cs-fixer', 0755, true);
}

$rules = require __DIR__ . '/.php-cs-fixer.rules.php';

return $config
    ->setCacheFile('.build/php-cs-fixer/cache.test')
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules(array_merge($rules, [
        'declare_strict_types' => true,
    ]));
