<h1 class="mb-4">Gestion des utilisateurs</h1>

<a href="<?= BASE_URL ?>users/create" class="btn btn-primary mb-3">
    Ajouter un utilisateur
</a>

<table class="table table-striped table-bordered align-middle">

    <thead class="table-dark">

        <tr>

            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Rôle</th>
            <th>Actions</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach ($users as $user): ?>

        <tr>

            <td><?= htmlspecialchars($user['lastname']) ?></td>

            <td><?= htmlspecialchars($user['firstname']) ?></td>

            <td><?= htmlspecialchars($user['email']) ?></td>

            <td><?= htmlspecialchars($user['phone']) ?></td>

            <td><?= htmlspecialchars($user['role']) ?></td>

            <td>

                <a href="<?= BASE_URL ?>users/edit?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">
                     Modifier
                </a>

                <a  href="<?= BASE_URL ?>users/delete?id=<?= $user['id'] ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Supprimer cet utilisateur ?')">

                Supprimer
                </a>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>