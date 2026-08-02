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
        $this->requireLogin();

        $agencies = Agency::getAll();

        $this->render('Trip/create', [
            'title' => 'Proposer un trajet',
            'agencies' => $agencies,
            'flash' => false,
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();

        if (
            (int) $_POST['departure_agency_id'] === (int) $_POST['arrival_agency_id']
        ) {
            header('Location: ' . BASE_URL . 'trips/create');
            exit;
        }

        if ($_POST['arrival_datetime'] <= $_POST['departure_datetime']) {
            header('Location: ' . BASE_URL . 'trips/create');
            exit;
        }

        Trip::create([
            'departure_agency_id' => (int) $_POST['departure_agency_id'],
            'arrival_agency_id' => (int) $_POST['arrival_agency_id'],
            'departure_datetime' => $_POST['departure_datetime'],
            'arrival_datetime' => $_POST['arrival_datetime'],
            'total_seats' => (int) $_POST['total_seats'],
            'available_seats' => (int) $_POST['total_seats'],
            'user_id' => $_SESSION['user']['id'],
        ]);

        $_SESSION['flash'] = 'Trajet créé avec succès.';

        header('Location: ' . BASE_URL);
        exit;
    }

    public function edit(): void
    {
        $this->requireLogin();

        $trip = Trip::findById((int) $_GET['id']);

        if (
            $_SESSION['user']['role'] !== 'admin'
            && $trip['user_id'] !== $_SESSION['user']['id']
        ) {
            header('Location: ' . BASE_URL);
            exit;
        }

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
        $this->requireLogin();

        $trip = Trip::findById((int) $_POST['id']);

        if (
            $_SESSION['user']['role'] !== 'admin'
            && $trip['user_id'] !== $_SESSION['user']['id']
        ) {
            header('Location: ' . BASE_URL);
            exit;
        }

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

        $_SESSION['flash'] = 'Trajet modifié avec succès.';

        header('Location: ' . BASE_URL);
        exit;
    }

    public function delete(): void
    {
        $this->requireLogin();

        $trip = Trip::findById((int) $_GET['id']);

        if (
            $_SESSION['user']['role'] !== 'admin'
            && $trip['user_id'] !== $_SESSION['user']['id']
        ) {
            header('Location: ' . BASE_URL);
            exit;
        }

        Trip::delete((int) $_GET['id']);

        $_SESSION['flash'] = 'Trajet supprimé avec succès.';

        header('Location: ' . BASE_URL);
        exit;
    }
}