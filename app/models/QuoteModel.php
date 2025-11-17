<?php

declare(strict_types=1);

namespace App\Models;

use App\Config\Database;
use PDO;

class QuoteModel
{
    public function create(array $data): void
    {
        $db = Database::connection();
        if ($db instanceof PDO) {
            $statement = $db->prepare('INSERT INTO quotes (name, email, phone, service_type, budget, message) VALUES (:name, :email, :phone, :service_type, :budget, :message)');
            $statement->execute([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'service_type' => $data['service_type'],
                'budget' => $data['budget'],
                'message' => $data['message'],
            ]);
            return;
        }

        $file = __DIR__ . '/../../storage/quotes.json';
        $quotes = json_decode((string) file_get_contents($file), true, 512, JSON_THROW_ON_ERROR);
        $data['created_at'] = date('c');
        $quotes[] = $data;
        file_put_contents($file, json_encode($quotes, JSON_PRETTY_PRINT));
    }

    public function all(): array
    {
        $db = Database::connection();
        if ($db instanceof PDO) {
            $query = $db->query('SELECT * FROM quotes ORDER BY created_at DESC');
            if ($query !== false) {
                return $query->fetchAll();
            }
        }

        $file = __DIR__ . '/../../storage/quotes.json';
        return json_decode((string) file_get_contents($file), true, 512, JSON_THROW_ON_ERROR);
    }
}
