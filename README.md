# TOUCHE PAS AU KLAXON

Application de covoiturage interne développée en PHP dans le cadre du titre professionnel Développeur Web.

## Fonctionnalités

- Authentification des utilisateurs
- Gestion des rôles (Administrateur / Utilisateur)
- Consultation des trajets disponibles
- Création d'un trajet
- Modification et suppression d'un trajet par son auteur
- Administration des agences
- Administration des trajets
- Administration des utilisateurs

## Technologies utilisées

- PHP 8.2
- MySQL / MariaDB
- Bootstrap 5
- Composer
- PHPUnit
- PHPStan

## Installation

1. Cloner le dépôt GitHub.

```bash
git clone <url-du-depot>
```

2. Installer les dépendances.

```bash
composer install
```

3. Importer la base de données.

- Exécuter `database/schema.sql`.
- Exécuter `database/seed.sql`.

4. Modifier le fichier :

```
config/config.php
```

avec les informations de connexion à la base de données.

5. Lancer XAMPP (Apache + MySQL).

6. Accéder à l'application :

```
http://localhost/touche-pas-au-klaxon/public/
```

## Comptes de démonstration

Les identifiants des comptes de démonstration sont fournis dans le document de rendu.

## Structure du projet

```
app/
config/
public/
routes/
sql/
tests/
vendor/
```

## Outils de qualité

Analyse statique :

```bash
vendor/bin/phpstan analyse app
```

Tests PHPUnit :

```bash
vendor/bin/phpunit
```

## Auteur

Projet réalisé dans le cadre de la formation Développeur Web.