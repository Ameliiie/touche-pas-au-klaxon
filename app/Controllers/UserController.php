<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

class UserController extends AbstractController
{
    public function index(): void
    {
        $this->requireAdmin();

        $users = User::getAll();

        $this->render('User/index', [
            'title' => 'Liste des utilisateurs',
            'users' => $users,
            'flash' => false,
        ]);
    }
}