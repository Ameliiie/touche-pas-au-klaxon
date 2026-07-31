<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Agency
{
    public static function getAll(): array
    {
        $pdo = Database::getInstance();

        $sql = "
            SELECT *
            FROM agencies
            ORDER BY city ASC
        ";

        $statement = $pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id): ?array
    {
        $pdo = Database::getInstance();

        $sql = "
            SELECT *
            FROM agencies
            WHERE id = :id
        ";

        $statement = $pdo->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        $agency = $statement->fetch(PDO::FETCH_ASSOC);

        return $agency ?: null;
    }
}