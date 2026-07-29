<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Gère le routage des requêtes de l'application.
 */
class Router
{
    /**
     * Analyse l'URL et appelle le contrôleur correspondant.
     */
    public function handleRequest(): void
    {
        // Récupère l'URL demandée
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Retire le chemin du projet
        $basePath = '/touche-pas-au-klaxon/public';
        $uri = str_replace($basePath, '', $uri);

        // Si l'URL est vide, on considère qu'il s'agit de la page d'accueil
        if ($uri === '') {
            $uri = '/';
        }

        // Charge les routes
        $routes = require __DIR__ . '/../../routes/web.php';

        // Vérifie si la route existe
        if (isset($routes[$uri])) {
            [$controller, $method] = $routes[$uri];

            $controller = new $controller();
            $controller->$method();
        } else {
            http_response_code(404);
            echo '404 - Page introuvable';
        }
    }
}