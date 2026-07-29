<?php

declare(strict_types=1);

namespace App\Controllers;

/**
 * Classe de base de tous les contrôleurs.
 */
class Controller
{
    /**
     * Charge une vue.
     */
    protected function render(string $view): void
    {
        require_once __DIR__ . '/../Views/' . $view . '.php';
    }
}