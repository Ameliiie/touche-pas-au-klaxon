<?php

namespace App\Models;

class Trip
{
    public static function getAll(): array
    {
        return [
            [
                'departure_city' => 'Orléans',
                'departure_date' => '30/07/2026',
                'departure_time' => '09:00',
                'arrival_city' => 'Paris',
                'arrival_date' => '30/07/2026',
                'arrival_time' => '11:00',
                'available_places' => 3,
            ],
            [
                'departure_city' => 'Lyon',
                'departure_date' => '31/07/2026',
                'departure_time' => '08:30',
                'arrival_city' => 'Marseille',
                'arrival_date' => '31/07/2026',
                'arrival_time' => '12:00',
                'available_places' => 2,
            ],
        ];
    }
}