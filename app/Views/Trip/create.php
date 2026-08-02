<h1 class="mb-4">Proposer un trajet</h1>

<form action="<?= BASE_URL ?>trips/store" method="post">

    <div class="row">

        <div class="col-md-6 mb-3">
            <label class="form-label">Prénom</label>

            <input
                type="text"
                class="form-control"
                value="<?= htmlspecialchars($currentUser['firstname']) ?>"
                readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Nom</label>

            <input
                type="text"
                class="form-control"
                value="<?= htmlspecialchars($currentUser['lastname']) ?>"
                readonly>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-3">
            <label class="form-label">Téléphone</label>

            <input
                type="text"
                class="form-control"
                value="<?= htmlspecialchars($currentUser['phone']) ?>"
                readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Email</label>

            <input
                type="email"
                class="form-control"
                value="<?= htmlspecialchars($currentUser['email']) ?>"
                readonly>
        </div>

    </div>

    <div class="mb-3">

        <label for="departure_agency_id" class="form-label">
            Agence de départ
        </label>

        <select
            id="departure_agency_id"
            name="departure_agency_id"
            class="form-select"
            required>

            <?php foreach ($agencies as $agency): ?>

                <option value="<?= $agency['id'] ?>">
                    <?= htmlspecialchars($agency['city']) ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label for="arrival_agency_id" class="form-label">
            Agence d'arrivée
        </label>

        <select
            id="arrival_agency_id"
            name="arrival_agency_id"
            class="form-select"
            required>

            <?php foreach ($agencies as $agency): ?>

                <option value="<?= $agency['id'] ?>">
                    <?= htmlspecialchars($agency['city']) ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label for="departure_datetime" class="form-label">
            Date et heure de départ
        </label>

        <input
            type="datetime-local"
            id="departure_datetime"
            name="departure_datetime"
            class="form-control"
            required>

    </div>

    <div class="mb-3">

        <label for="arrival_datetime" class="form-label">
            Date et heure d'arrivée
        </label>

        <input
            type="datetime-local"
            id="arrival_datetime"
            name="arrival_datetime"
            class="form-control"
            required>

    </div>

    <div class="mb-3">

        <label for="total_seats" class="form-label">
            Nombre total de places
        </label>

        <input
            type="number"
            id="total_seats"
            name="total_seats"
            class="form-control"
            min="1"
            required>

    </div>

    <button type="submit" class="btn btn-success">
        Enregistrer
    </button>

    <a href="<?= BASE_URL ?>" class="btn btn-secondary">
        Annuler
    </a>

</form>