<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Trip;

class TripService
{

/**
 * Crée un nouveau trajet après validation des règles métier.
 *
 * param array $data : Données du trajet.
 * param int $userId : Identifiant de l'utilisateur connecté.
 *
 * return array : Résultat de l'opération.
 */
   public function create(array $data, int $userId): array
{
    if ((int) $data['departure_agency_id'] === (int) $data['arrival_agency_id']) {
        return [
            'success' => false,
            'message' => "L'agence de départ et d'arrivée doivent être différentes."
        ];
    }

    if ($data['arrival_datetime'] <= $data['departure_datetime']) {
        return [
            'success' => false,
            'message' => "La date d'arrivée doit être postérieure à la date de départ."
        ];
    }

    $data['available_seats'] = (int) $data['total_seats'];
    $data['user_id'] = $userId;

    Trip::create($data);

    return [
        'success' => true,
        'message' => 'Trajet créé avec succès.'
    ];
}

/**
 * Met à jour un trajet après validation des droits et des règles métier.
 *
 * param int $tripId : Identifiant du trajet.
 * param array $data : Données du formulaire.
 * param array $currentUser : Utilisateur connecté.
 *
 * return array : Résultat de l'opération.
 */
public function update(int $tripId, array $data, array $currentUser): array
{
    $trip = Trip::findById($tripId);

    if ($trip === null) {
        return [
            'success' => false,
            'message' => 'Trajet introuvable.'
        ];
    }

    if (
        $currentUser['role'] !== 'admin'
        && $trip['user_id'] !== $currentUser['id']
    ) {
        return [
            'success' => false,
            'message' => "Vous n'êtes pas autorisé à modifier ce trajet."
        ];
    }

    if ((int) $data['departure_agency_id'] === (int) $data['arrival_agency_id']) {
        return [
            'success' => false,
            'message' => "L'agence de départ et d'arrivée doivent être différentes."
        ];
    }

    if ($data['arrival_datetime'] <= $data['departure_datetime']) {
        return [
            'success' => false,
            'message' => "La date d'arrivée doit être postérieure à la date de départ."
        ];
    }

    Trip::update($tripId, $data);

    return [
        'success' => true,
        'message' => 'Trajet modifié avec succès.'
    ];
}

    /**
 * Supprime un trajet après vérification des droits.
 *
 * param int $tripId Identifiant du trajet.
 * param array $currentUser Utilisateur connecté.
 *
 * return array Résultat de l'opération.
 */
public function delete(int $tripId, array $currentUser): array
{
    $trip = Trip::findById($tripId);

    if ($trip === null) {
        return [
            'success' => false,
            'message' => 'Trajet introuvable.'
        ];
    }

    if (
        $currentUser['role'] !== 'admin'
        && $trip['user_id'] !== $currentUser['id']
    ) {
        return [
            'success' => false,
            'message' => "Vous n'êtes pas autorisé à supprimer ce trajet."
        ];
    }

    Trip::delete($tripId);

    return [
        'success' => true,
        'message' => 'Trajet supprimé avec succès.'
    ];
}
}