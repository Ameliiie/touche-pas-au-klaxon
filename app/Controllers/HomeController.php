<?php

declare(strict_types=1);

namespace App\Controllers;

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
        $this->render('Home/index');
    }
}