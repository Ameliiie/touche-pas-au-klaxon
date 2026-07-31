<?php

declare(strict_types=1);

namespace App\Controllers;

abstract class Controller
{
    protected function render(string $view, array $data = []): void
    {
        $user = $_SESSION['user'] ?? null;

        $data['isLogged'] = $user !== null;
        $data['isAdmin'] = $user !== null && $user['role'] === 'admin';
        $data['currentUser'] = $user;

        extract($data);

        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        require_once __DIR__ . '/../Views/layouts/main.php';
    }
    
    protected function requireLogin(): void
{
    if (!isset($_SESSION['user'])) {
        header('Location: ' . BASE_URL . 'login');
        exit;
    }
}

protected function requireAdmin(): void
{
    $this->requireLogin();

    if ($_SESSION['user']['role'] !== 'admin') {
        header('Location: ' . BASE_URL);
        exit;
    }
}
}