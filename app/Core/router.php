<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    public function handleRequest(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $routes = require __DIR__ . '/../../routes/web.php';

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