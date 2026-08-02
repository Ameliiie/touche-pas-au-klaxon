<?php

declare(strict_types=1);

namespace Tests;

use App\Models\Trip;
use PHPUnit\Framework\TestCase;

final class TripTest extends TestCase
{
    public function testGetAllReturnsArray(): void
    {
        $trips = Trip::getAll();

        $this->assertIsArray($trips);
    }
}