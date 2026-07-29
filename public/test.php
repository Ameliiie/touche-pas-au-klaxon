<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

try {
    Database::getInstance();
    echo "Connexion à la base de données réussie !";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}