<?php

declare(strict_types=1);

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null;

    public static function connection(): ?PDO
    {
        if (self::$connection !== null) {
            return self::$connection;
        }

        $host = getenv('DB_HOST') ?: '127.0.0.1';
        $database = getenv('DB_NAME') ?: 'builderest';
        $user = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASSWORD') ?: '';
        $charset = 'utf8mb4';
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $host, $database, $charset);

        try {
            self::$connection = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $exception) {
            error_log('Database connection failed: ' . $exception->getMessage());
            self::$connection = null;
        }

        return self::$connection;
    }
}
