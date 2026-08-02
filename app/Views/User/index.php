<h1 class="mb-4">Liste des utilisateurs</h1>

<table class="table table-striped table-bordered align-middle">

    <thead class="table-dark">

        <tr>

            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Rôle</th>

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

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>