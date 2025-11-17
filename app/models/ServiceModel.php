<?php

declare(strict_types=1);

namespace App\Models;

use App\Config\Database;
use PDO;

class ServiceModel
{
    private array $seeded = [];

    public function __construct()
    {
        $this->seeded = $this->loadSeed();
    }

    private function loadSeed(): array
    {
        $file = __DIR__ . '/../data/cache_services.php';
        if (file_exists($file)) {
            return require $file;
        }

        return [];
    }

    private function persist(array $services): void
    {
        $file = __DIR__ . '/../data/cache_services.php';
        file_put_contents($file, '<?php return ' . var_export($services, true) . ';');
    }

    public function seed(array $services): void
    {
        if (!empty($this->seeded)) {
            return;
        }

        $this->seeded = $services;
        $this->persist($services);
    }

    public function all(int $limit = 6): array
    {
        $db = Database::connection();
        if ($db instanceof PDO) {
            $query = $db->query('SELECT id, name, summary, description, icon, badge FROM services LIMIT ' . $limit);
            if ($query !== false) {
                return $query->fetchAll();
            }
        }

        return array_slice($this->seeded, 0, $limit);
    }

    public function find(int $id): ?array
    {
        $db = Database::connection();
        if ($db instanceof PDO) {
            $statement = $db->prepare('SELECT * FROM services WHERE id = :id');
            $statement->execute(['id' => $id]);
            $service = $statement->fetch();
            if ($service) {
                return $service;
            }
        }

        foreach ($this->seeded as $service) {
            if ((int) $service['id'] === $id) {
                return $service;
            }
        }

        return null;
    }
}
