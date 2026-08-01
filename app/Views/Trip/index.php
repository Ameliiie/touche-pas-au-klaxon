<h1 class="mb-4">Gestion des trajets</h1>

<a href="<?= BASE_URL ?>trips/create" class="btn btn-primary mb-3">
    Ajouter un trajet
</a>

<table class="table table-striped table-bordered align-middle">

    <thead class="table-dark">

        <tr>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Date de départ</th>
            <th>Date d'arrivée</th>
            <th>Places</th>
            <th>Actions</th>
        </tr>

    </thead>

    <tbody>

    <?php foreach ($trips as $trip): ?>

        <tr>

            <td><?= htmlspecialchars($trip['departure_city']) ?></td>

            <td><?= htmlspecialchars($trip['arrival_city']) ?></td>

            <td><?= date('d/m/Y H:i', strtotime($trip['departure_datetime'])) ?></td>

            <td><?= date('d/m/Y H:i', strtotime($trip['arrival_datetime'])) ?></td>

            <td>
                <?= $trip['available_seats'] ?>
                /
                <?= $trip['total_seats'] ?>
            </td>

            <td>

                <a href="<?= BASE_URL ?>trips/edit?id=<?= $trip['id'] ?>" class="btn btn-warning btn-sm">
                    Modifier
                </a>

                <a href="<?= BASE_URL ?>trips/delete?id=<?= $trip['id'] ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Supprimer ce trajet ?')">
                Supprimer
                </a>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>