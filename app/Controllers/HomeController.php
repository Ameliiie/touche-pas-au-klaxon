<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Trip;

/**
 * Contrôleur de la page d'accueil.
 */
class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil.
     */
    public function index(): void
    {
        $trips = Trip::getAll();

        $this->render('Home/index', [
            'title' => 'Accueil',
            'trips' => $trips,
            'isLogged' => false,
            'isAdmin' => false,
            'flash' => false,
        ]);
    }
}