<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

/**
 * Classe de base de tous les modèles.
 *
 * Fournit un accès commun à la base de données.
 */
abstract class AbstractModel
{
    /**
     * Retourne l'instance PDO.
     */
    protected static function db(): PDO
    {
        return Database::getInstance();
    }
}