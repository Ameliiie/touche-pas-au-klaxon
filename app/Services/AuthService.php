<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class AuthService
{
    /**
 * Authentifie un utilisateur.
 *
 *  string $email : Adresse e-mail.
 *  string $password : Mot de passe.
 *
 * return array : Résultat de l'authentification.
 */

public function login(string $email, string $password): array
{
    $user = User::findByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        return [
            'success' => true,
            'user' => $user,
            'message' => 'Connexion réussie.'
        ];
    }

    return [
        'success' => false,
        'message' => 'Adresse e-mail ou mot de passe incorrect.'
    ];
}
}