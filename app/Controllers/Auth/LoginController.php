<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Controllers\AbstractController;
use App\Services\AuthService;

class LoginController extends AbstractController
{
    public function index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->login();
            return;
        }

        $this->render('Auth/login', [
            'title' => 'Connexion',
            'isLogged' => false,
            'isAdmin' => false,
            'flash' => false,
        ]);
    }

    public function login(): void
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $authService = new AuthService();

    $result = $authService->login($email, $password);

    if ($result['success']) {
        $_SESSION['user'] = $result['user'];

        header('Location: ' . BASE_URL);
        exit;
    }

    $_SESSION['flash'] = $result['message'];

    header('Location: ' . BASE_URL . 'login');
    exit;
}

    public function logout(): void
    {
        session_destroy();

        header('Location: ' . BASE_URL);

        exit;
    }
}