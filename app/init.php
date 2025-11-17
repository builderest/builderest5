<?php

declare(strict_types=1);

session_start();

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/helpers.php';

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\Models\\';
    $baseDir = __DIR__ . '/models/';

    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

require_once __DIR__ . '/data/services.php';
require_once __DIR__ . '/data/plans.php';
require_once __DIR__ . '/data/blog.php';
require_once __DIR__ . '/data/portfolio.php';
