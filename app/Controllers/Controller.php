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
protected function render(string $view, array $data = []): void
{
    extract($data);

    $viewPath = __DIR__ . '/../Views/' . $view . '.php';

    require_once __DIR__ . '/../Views/layouts/main.php';
}
}