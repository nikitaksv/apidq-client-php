<?php

declare(strict_types=1);

use Dotenv\Dotenv;

if (
    function_exists('date_default_timezone_set')
    && function_exists('date_default_timezone_get')
) {
    date_default_timezone_set(date_default_timezone_get());
}

if (!is_file($autoloadFile = __DIR__ . '/../vendor/autoload.php')) {
    throw new RuntimeException('Did not find vendor/autoload.php. Did you run "composer install --dev"?');
}

$loader = require $autoloadFile;
$loader->add('ApiDQ\\TestUtils', __DIR__ . '/tests/utils');
$loader->add('ApiDQ\\Tests', __DIR__ . '/src');

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}
