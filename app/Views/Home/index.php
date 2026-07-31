<h1 class="mb-4">Trajets proposés</h1>

<?php if (!$isLogged): ?>

    <p class="mb-4">
        Pour obtenir plus d'informations sur un trajet, veuillez vous connecter.
    </p>

<?php endif; ?>

<?php if ($flash): ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        Votre action a bien été prise en compte.

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

<?php endif; ?>

<div class="table-responsive">

    <table class="table table-striped table-hover align-middle">

        <thead class="table-dark">

            <tr>

                <th>Départ</th>
                <th>Date</th>
                <th>Heure</th>

                <th>Destination</th>
                <th>Date</th>
                <th>Heure</th>

                <th>Places</th>

                <?php if ($isLogged): ?>

                    <th class="text-center">Actions</th>

                <?php endif; ?>

            </tr>

        </thead>

        <tbody>

            <?php foreach ($trips as $trip): ?>

                <tr>

                    <td><?= htmlspecialchars($trip['departure_city']) ?></td>

                    <td><?= date('d/m/Y', strtotime($trip['departure_datetime'])) ?></td>

                    <td><?= date('H:i', strtotime($trip['departure_datetime'])) ?></td>

                    <td><?= htmlspecialchars($trip['arrival_city']) ?></td>

                    <td><?= date('d/m/Y', strtotime($trip['arrival_datetime'])) ?></td>

                    <td><?= date('H:i', strtotime($trip['arrival_datetime'])) ?></td>

                    <td><?= htmlspecialchars((string) $trip['available_seats']) ?></td>

                    <?php if ($isLogged): ?>

                        <td class="text-center">

                            <button
                                class="btn btn-link text-dark p-0"
                                data-bs-toggle="modal"
                                data-bs-target="#tripModal">

                                <i class="bi bi-eye"></i>

                            </button>

                            <button class="btn btn-link text-dark p-0 ms-2">

                                <i class="bi bi-pencil-square"></i>

                            </button>

                            <button class="btn btn-link text-dark p-0 ms-2">

                                <i class="bi bi-trash"></i>

                            </button>

                        </td>

                    <?php endif; ?>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php if ($isLogged): ?>

<div class="modal fade" id="tripModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p><strong>Auteur :</strong> À compléter</p>
                <p><strong>Téléphone :</strong> À compléter</p>
                <p><strong>Email :</strong> À compléter</p>
                <p><strong>Nombre total de places :</strong> À compléter</p>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Fermer

                </button>

            </div>

        </div>

    </div>

</div>

<?php endif; ?>