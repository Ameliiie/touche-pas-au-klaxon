<?php

namespace App\Core;

use PDO;
use PDOException;

// Manages the database connection
// Gére la base de données 

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {

            // Loads the constants containing the database connection settings.
            // Charge les constantes contenant les informations de connexion 
            require_once __DIR__ . '/../../config/config.php';

            try {

                // Creates the connection to the MySQL database.
                // Création de la connexion à la base de données MySQL. 
                self::$instance = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                    DB_USER,
                    DB_PASS
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {

                // Stops the program and displays the error message if the database connection fails.
                // Arrête le programme et affiche le message d'erreur si la connexion à la base de données échoue.//
                die("Erreur de connexion : " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}