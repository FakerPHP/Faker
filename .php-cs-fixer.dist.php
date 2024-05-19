<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude([
        '.build/',
        '.github/',
        'test/',
        'vendor-bin/',
    ])
    ->ignoreDotFiles(false)
    ->in(__DIR__);

$config = new PhpCsFixer\Config('faker');

if (!is_dir('.build/php-cs-fixer')) {
    mkdir('.build/php-cs-fixer', 0755, true);
}

$rules = require __DIR__ . '/.php-cs-fixer.rules.php';

return $config
    ->setCacheFile('.build/php-cs-fixer/cache')
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules($rules);
