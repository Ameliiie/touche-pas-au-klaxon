<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Agency;
use App\Models\Trip;
use App\Services\TripService;

/**
 * Contrôleur de gestion des trajets.
 */
class TripController extends AbstractController
{
    /**
    * Affiche la liste des trajets.
    */
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

    /**
    * Affiche le formulaire de création d'un trajet.
    */
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

    /**
    * Enregistre un nouveau trajet.
    */
    public function store(): void
{
    $this->requireLogin();

    $tripService = new TripService();

    $result = $tripService->create(
        $_POST,
        $_SESSION['user']['id']
    );

    $_SESSION['flash'] = $result['message'];

    if (!$result['success']) {
        header('Location: ' . BASE_URL . 'trips/create');
        exit;
    }

    header('Location: ' . BASE_URL);
    exit;
}

    /**
    * Affiche le formulaire de modification d'un trajet.
    */    
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
    
    /**
    * Met à jour un trajet.
    */
    public function update(): void
{
    $this->requireLogin();

    $tripService = new TripService();

    $result = $tripService->update(
        (int) $_POST['id'],
        $_POST,
        $_SESSION['user']
    );

    $_SESSION['flash'] = $result['message'];

    if (!$result['success']) {
        header('Location: ' . BASE_URL);
        exit;
    }

    header('Location: ' . BASE_URL);
    exit;
}

    public function delete(): void
{
    $this->requireLogin();

    $tripService = new TripService();

    $result = $tripService->delete(
        (int) $_GET['id'],
        $_SESSION['user']
    );

    $_SESSION['flash'] = $result['message'];

    header('Location: ' . BASE_URL);
    exit;
}
}