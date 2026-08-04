<?php if (isset($_SESSION['flash'])) : ?>

    <div class="alert alert-danger">

        <?= htmlspecialchars($_SESSION['flash']) ?>

    </div>

    <?php unset($_SESSION['flash']); ?>

<?php endif; ?>

<h1 class="mb-4">Connexion</h1>

<form method="post">

    <div class="mb-3">

        <label for="email" class="form-label">
            Adresse e-mail
        </label>

        <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            required>

    </div>

    <div class="mb-3">

        <label for="password" class="form-label">
            Mot de passe
        </label>

        <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required>

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Se connecter

    </button>

</form>