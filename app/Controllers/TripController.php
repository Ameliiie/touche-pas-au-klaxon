<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Agency;
use App\Models\Trip;

class TripController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();

        $trips = Trip::getAll();

        $this->render('Trip/index', [
            'title' => 'Gestion des trajets',
            'trips' => $trips,
            'flash' => false,
        ]);
    }

    public function create(): void
    {
        $this->requireAdmin();

        $agencies = Agency::getAll();

        $this->render('Trip/create', [
            'title' => 'Ajouter un trajet',
            'agencies' => $agencies,
            'flash' => false,
        ]);
    }

    public function store(): void
    {
        $this->requireAdmin();

        Trip::create([
            'departure_agency_id' => (int) $_POST['departure_agency_id'],
            'arrival_agency_id' => (int) $_POST['arrival_agency_id'],
            'departure_datetime' => $_POST['departure_datetime'],
            'arrival_datetime' => $_POST['arrival_datetime'],
            'total_seats' => (int) $_POST['total_seats'],
            'available_seats' => (int) $_POST['total_seats'],
            'user_id' => $_SESSION['user']['id'],
        ]);

        header('Location: ' . BASE_URL . 'trips');
        exit;
    }

    public function edit(): void
    {
        $this->requireAdmin();

        $trip = Trip::findById((int) $_GET['id']);

        $agencies = Agency::getAll();

        $this->render('Trip/edit', [
            'title' => 'Modifier un trajet',
            'trip' => $trip,
            'agencies' => $agencies,
            'flash' => false,
        ]);
    }

    public function update(): void
    {
        $this->requireAdmin();

        Trip::update(
            (int) $_POST['id'],
            [
                'departure_agency_id' => (int) $_POST['departure_agency_id'],
                'arrival_agency_id' => (int) $_POST['arrival_agency_id'],
                'departure_datetime' => $_POST['departure_datetime'],
                'arrival_datetime' => $_POST['arrival_datetime'],
                'total_seats' => (int) $_POST['total_seats'],
                'available_seats' => (int) $_POST['available_seats'],
            ]
        );

        header('Location: ' . BASE_URL . 'trips');
        exit;
    }
    public function delete(): void
{
    $this->requireAdmin();

    Trip::delete((int) $_GET['id']);

    header('Location: ' . BASE_URL . 'trips');
    exit;
}
}