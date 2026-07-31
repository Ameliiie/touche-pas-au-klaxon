<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
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

        $user = User::findByEmail($email);

        if (
            $user &&
            password_verify($password, $user['password'])
        ) {

            $_SESSION['user'] = $user;

            header('Location: ' . BASE_URL);
            exit;
        }

        $this->render('Auth/login', [
            'title' => 'Connexion',
            'flash' => false,
        ]);
    }

    public function logout(): void
    {
        session_destroy();

        header('Location: ' . BASE_URL);

        exit;
    }
}