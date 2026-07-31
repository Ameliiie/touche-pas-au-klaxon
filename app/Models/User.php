<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    public static function getAll(): array
    {
        $pdo = Database::getInstance();

        $sql = "
            SELECT *
            FROM users
            ORDER BY lastname ASC, firstname ASC
        ";

        $statement = $pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id): ?array
    {
        $pdo = Database::getInstance();

        $sql = "
            SELECT *
            FROM users
            WHERE id = :id
        ";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            'id' => $id
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public static function findByEmail(string $email): ?array
    {
        $pdo = Database::getInstance();

        $sql = "
            SELECT *
            FROM users
            WHERE email = :email
        ";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            'email' => $email
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}