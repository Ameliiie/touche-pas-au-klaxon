<h1 class="mb-4">Modifier un trajet</h1>

<form action="<?= BASE_URL ?>trips/update" method="post">

    <input
        type="hidden"
        name="id"
        value="<?= $trip['id'] ?>">

    <div class="mb-3">

        <label class="form-label">
            Agence de départ
        </label>

        <select
            name="departure_agency_id"
            class="form-select"
            required>

            <?php foreach ($agencies as $agency): ?>

                <option
                    value="<?= $agency['id'] ?>"
                    <?= $agency['id'] == $trip['departure_agency_id'] ? 'selected' : '' ?>>

                    <?= htmlspecialchars($agency['city']) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Agence d'arrivée
        </label>

        <select
            name="arrival_agency_id"
            class="form-select"
            required>

            <?php foreach ($agencies as $agency): ?>

                <option
                    value="<?= $agency['id'] ?>"
                    <?= $agency['id'] == $trip['arrival_agency_id'] ? 'selected' : '' ?>>

                    <?= htmlspecialchars($agency['city']) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Date et heure de départ
        </label>

        <input
            type="datetime-local"
            name="departure_datetime"
            class="form-control"
            value="<?= date('Y-m-d\TH:i', strtotime($trip['departure_datetime'])) ?>"
            required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Date et heure d'arrivée
        </label>

        <input
            type="datetime-local"
            name="arrival_datetime"
            class="form-control"
            value="<?= date('Y-m-d\TH:i', strtotime($trip['arrival_datetime'])) ?>"
            required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Nombre total de places
        </label>

        <input
            type="number"
            name="total_seats"
            class="form-control"
            value="<?= $trip['total_seats'] ?>"
            min="1"
            required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Nombre de places disponibles
        </label>

        <input
            type="number"
            name="available_seats"
            class="form-control"
            value="<?= $trip['available_seats'] ?>"
            min="0"
            required>

    </div>

    <button
        type="submit"
        class="btn btn-success">

        Enregistrer

    </button>

    <a
        href="<?= BASE_URL ?>"
        class="btn btn-secondary">

        Annuler

    </a>

</form>