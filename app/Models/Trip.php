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

                departure.city AS departure_city,
                arrival.city AS arrival_city,

                departure_datetime,
                arrival_datetime,

                available_seats

            FROM trips

            INNER JOIN agencies AS departure
                ON departure.id = trips.departure_agency_id

            INNER JOIN agencies AS arrival
                ON arrival.id = trips.arrival_agency_id

            ORDER BY departure_datetime ASC
        ";

        $statement = $pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}