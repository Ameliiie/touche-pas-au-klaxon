<?php

declare(strict_types=1);

namespace App\Models;


use PDO;

class User extends AbstractModel
{
    public static function getAll(): array
    {
        $pdo = self::db();

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
       $pdo = self::db();

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
        $pdo = self::db();

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

    public static function create(array $data): void
    {
        $pdo = self::db();

        $sql = "
            INSERT INTO users (
                firstname,
                lastname,
                email,
                phone,
                password,
                role
            )
            VALUES (
                :firstname,
                :lastname,
                :email,
                :phone,
                :password,
                :role
            )
        ";

        $statement = $pdo->prepare($sql);

        $statement->execute($data);
    }

    public static function update(int $id, array $data): void
    {
        $pdo = self::db();

        $sql = "
            UPDATE users
            SET
                firstname = :firstname,
                lastname = :lastname,
                email = :email,
                phone = :phone,
                role = :role
            WHERE id = :id
        ";

        $data['id'] = $id;

        $statement = $pdo->prepare($sql);

        $statement->execute($data);
    }
    
    public static function delete(int $id): void
{
        $pdo = self::db();

        $sql = "
            DELETE FROM users
            WHERE id = :id
        ";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        'id' => $id
    ]);
}
}