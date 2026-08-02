<h1 class="mb-4">Gestion des agences</h1>

<a href="<?= BASE_URL ?>agencies/create" class="btn btn-primary mb-3">
    Ajouter une agence
</a>

<table class="table table-striped table-bordered">

    <thead class="table-dark">

        <tr>
            <th>Ville</th>
            <th>Actions</th>
        </tr>

    </thead>

    <tbody>

    <?php foreach ($agencies as $agency): ?>

        <tr>

            <td><?= htmlspecialchars($agency['city']) ?></td>

            <td>

                <a href="<?= BASE_URL ?>agencies/edit?id=<?= $agency['id'] ?>" class="btn btn-warning btn-sm">
                    Modifier
                </a>

                <a
                    href="<?= BASE_URL ?>agencies/delete?id=<?= $agency['id'] ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Supprimer cette agence ?')">

                    Supprimer

                </a>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>