<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();

        $users = User::getAll();

        $this->render('User/index', [
            'title' => 'Gestion des utilisateurs',
            'users' => $users,
            'flash' => false,
        ]);
    }
    public function create(): void
{
    $this->requireAdmin();

    $this->render('User/create', [
        'title' => 'Ajouter un utilisateur',
        'flash' => false,
    ]);
}

public function store(): void
{
    $this->requireAdmin();

    User::create([
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'role' => $_POST['role'],
    ]);

    header('Location: ' . BASE_URL . 'users');
    exit;
}
public function edit(): void
{
    $this->requireAdmin();

    $user = User::findById((int) $_GET['id']);

    $this->render('User/edit', [
        'title' => 'Modifier un utilisateur',
        'user' => $user,
        'flash' => false,
    ]);
}

public function update(): void
{
    $this->requireAdmin();

    User::update(
        (int) $_POST['id'],
        [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'role' => $_POST['role'],
        ]
    );

    header('Location: ' . BASE_URL . 'users');
    exit;
}
public function delete(): void
{
    $this->requireAdmin();

    User::delete((int) $_GET['id']);

    header('Location: ' . BASE_URL . 'users');
    exit;
}
}