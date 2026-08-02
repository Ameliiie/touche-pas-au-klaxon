<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Agency;

class AgencyController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();

        $agencies = Agency::getAll();

        $this->render('Agency/index', [
            'title' => 'Gestion des agences',
            'agencies' => $agencies,
            'flash' => false,
        ]);
    }

    public function create(): void
    {
        $this->requireAdmin();

        $this->render('Agency/create', [
            'title' => 'Ajouter une agence',
            'flash' => false,
        ]);
    }

    public function store(): void
    {
        $this->requireAdmin();

        Agency::create([
            'city' => $_POST['city']
        ]);

        header('Location: ' . BASE_URL . 'agencies');
        exit;
    }

    public function edit(): void
    {
        $this->requireAdmin();

        $agency = Agency::findById((int) $_GET['id']);

        $this->render('Agency/edit', [
            'title' => 'Modifier une agence',
            'agency' => $agency,
            'flash' => false,
        ]);
    }

    public function update(): void
    {
        $this->requireAdmin();

        Agency::update(
            (int) $_POST['id'],
            [
                'city' => $_POST['city']
            ]
        );

        header('Location: ' . BASE_URL . 'agencies');
        exit;
    }

    public function delete(): void
    {
        $this->requireAdmin();

        Agency::delete((int) $_GET['id']);

        header('Location: ' . BASE_URL . 'agencies');
        exit;
    }
}