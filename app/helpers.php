<?php

declare(strict_types=1);

use App\Models\ServiceModel;

function asset(string $path): string
{
    return '/' . ltrim($path, '/');
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function current_year(): string
{
    return date('Y');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function validate_csrf(?string $token): bool
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], (string) $token);
}

function request_services(): array
{
    static $services;
    if (!$services) {
        $services = (new ServiceModel())->all();
    }

    return $services;
}
