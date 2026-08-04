<?php

declare(strict_types=1);

namespace Tests;

use App\Services\TripService;
use PHPUnit\Framework\TestCase;

final class TripTest extends TestCase
{
    public function testCreateFailsWhenAgenciesAreIdentical(): void
{
    $service = new TripService();

    $result = $service->create([
        'departure_agency_id' => 1,
        'arrival_agency_id' => 1,
        'departure_datetime' => '2026-08-10 08:00:00',
        'arrival_datetime' => '2026-08-10 10:00:00',
        'total_seats' => 4,
    ], 1);

    $this->assertFalse($result['success']);
}

    public function testCreateFailsWhenArrivalDateIsBeforeDepartureDate(): void
{
    $service = new TripService();

    $result = $service->create([
        'departure_agency_id' => 1,
        'arrival_agency_id' => 2,
        'departure_datetime' => '2026-08-10 10:00:00',
        'arrival_datetime' => '2026-08-10 08:00:00',
        'total_seats' => 4,
    ], 1);

    $this->assertFalse($result['success']);
}

    public function testCreateReturnsCorrectErrorMessageWhenAgenciesAreIdentical(): void
{
    $service = new TripService();

    $result = $service->create([
        'departure_agency_id' => 1,
        'arrival_agency_id' => 1,
        'departure_datetime' => '2026-08-10 08:00:00',
        'arrival_datetime' => '2026-08-10 10:00:00',
        'total_seats' => 4,
    ], 1);

    $this->assertEquals(
        "L'agence de départ et d'arrivée doivent être différentes.",
        $result['message']
    );
}
}