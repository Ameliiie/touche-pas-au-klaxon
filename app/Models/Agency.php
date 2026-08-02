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

    public static function create(array $data): void
    {
        $pdo = Database::getInstance();

        $sql = "
            INSERT INTO agencies (
                city
            )
            VALUES (
                :city
            )
        ";

        $statement = $pdo->prepare($sql);

        $statement->execute($data);
    }

    public static function update(int $id, array $data): void
    {
        $pdo = Database::getInstance();

        $sql = "
            UPDATE agencies
            SET
                city = :city
            WHERE id = :id
        ";

        $data['id'] = $id;

        $statement = $pdo->prepare($sql);

        $statement->execute($data);
    }

    public static function delete(int $id): void
    {
        $pdo = Database::getInstance();

        $sql = "
            DELETE FROM agencies
            WHERE id = :id
        ";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            'id' => $id
        ]);
    }
}