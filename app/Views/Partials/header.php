<header class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="<?= BASE_URL ?>">
            TOUCHE PAS AU KLAXON
        </a>

        <?php if ($isAdmin): ?>

            <div class="ms-auto d-flex align-items-center gap-3">

                <a href="#" class="btn btn-secondary">
                    Utilisateurs
                </a>

                <a href="#" class="btn btn-secondary">
                    Agences
                </a>

                <a href="<?= BASE_URL ?>trips" class="btn btn-secondary">
                    Trajets
                </a>

                <span class="text-white">
                    Bonjour <?= htmlspecialchars($currentUser['firstname']) ?>
                    <?= htmlspecialchars($currentUser['lastname']) ?>
                </span>

                <a href="<?= BASE_URL ?>logout" class="btn btn-outline-light">
                    Déconnexion
                </a>

            </div>

        <?php elseif ($isLogged): ?>

            <div class="ms-auto d-flex align-items-center gap-3">

                <a href="#" class="btn btn-secondary">
                    Créer un trajet
                </a>

                <span class="text-white">
                    Bonjour <?= htmlspecialchars($currentUser['firstname']) ?>
                    <?= htmlspecialchars($currentUser['lastname']) ?>
                </span>

                <a href="<?= BASE_URL ?>logout" class="btn btn-outline-light">
                    Déconnexion
                </a>

            </div>

        <?php else: ?>

            <div class="ms-auto">

                <a href="<?= BASE_URL ?>login" class="btn btn-outline-light">
                    Connexion
                </a>

            </div>

        <?php endif; ?>

    </div>

</header>