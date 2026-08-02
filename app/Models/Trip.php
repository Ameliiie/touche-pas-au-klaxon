<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Trip
{
    public static function getAll(): array
    {
        $pdo = Database::getInstance();

        $sql = "
            SELECT
                trips.id,
                trips.user_id,

                departure.city AS departure_city,
                arrival.city AS arrival_city,

                departure_datetime,
                arrival_datetime,

                total_seats,
                available_seats,

                users.firstname,
                users.lastname,
                users.email,
                users.phone

            FROM trips

            INNER JOIN agencies AS departure
                ON departure.id = trips.departure_agency_id

            INNER JOIN agencies AS arrival
                ON arrival.id = trips.arrival_agency_id

            INNER JOIN users
                ON users.id = trips.user_id

            WHERE
                departure_datetime >= NOW()
                AND available_seats > 0

            ORDER BY departure_datetime ASC
        ";

        $statement = $pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(array $data): void
    {
        $pdo = Database::getInstance();

        $sql = "
            INSERT INTO trips (
                departure_agency_id,
                arrival_agency_id,
                departure_datetime,
                arrival_datetime,
                total_seats,
                available_seats,
                user_id
            )
            VALUES (
                :departure_agency_id,
                :arrival_agency_id,
                :departure_datetime,
                :arrival_datetime,
                :total_seats,
                :available_seats,
                :user_id
            )
        ";

        $statement = $pdo->prepare($sql);

        $statement->execute($data);
    }

    public static function findById(int $id): ?array
    {
        $pdo = Database::getInstance();

        $sql = "
            SELECT *
            FROM trips
            WHERE id = :id
        ";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            'id' => $id
        ]);

        $trip = $statement->fetch(PDO::FETCH_ASSOC);

        return $trip ?: null;
    }

    public static function update(int $id, array $data): void
    {
        $pdo = Database::getInstance();

        $sql = "
            UPDATE trips
            SET
                departure_agency_id = :departure_agency_id,
                arrival_agency_id = :arrival_agency_id,
                departure_datetime = :departure_datetime,
                arrival_datetime = :arrival_datetime,
                total_seats = :total_seats,
                available_seats = :available_seats
            WHERE id = :id
        ";

        $statement = $pdo->prepare($sql);

        $data['id'] = $id;

        $statement->execute($data);
    }

    public static function delete(int $id): void
    {
        $pdo = Database::getInstance();

        $sql = "
            DELETE FROM trips
            WHERE id = :id
        ";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            'id' => $id
        ]);
    }
}