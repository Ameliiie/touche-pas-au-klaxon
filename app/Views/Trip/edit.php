<h1 class="mb-4">Modifier un trajet</h1>

<form action="<?= BASE_URL ?>trips/update" method="post">

<input type="hidden" name="id" value="<?= $trip['id'] ?>">

<div class="mb-3">

<label class="form-label">Agence de départ</label>

<select name="departure_agency_id" class="form-select">

<?php foreach($agencies as $agency): ?>

<option
value="<?= $agency['id'] ?>"
<?= $agency['id']==$trip['departure_agency_id']?'selected':'' ?>>

<?= htmlspecialchars($agency['city']) ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">Agence d'arrivée</label>

<select name="arrival_agency_id" class="form-select">

<?php foreach($agencies as $agency): ?>

<option
value="<?= $agency['id'] ?>"
<?= $agency['id']==$trip['arrival_agency_id']?'selected':'' ?>>

<?= htmlspecialchars($agency['city']) ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">Départ</label>

<input
type="datetime-local"
name="departure_datetime"
class="form-control"
value="<?= date('Y-m-d\TH:i',strtotime($trip['departure_datetime'])) ?>">

</div>

<div class="mb-3">

<label class="form-label">Arrivée</label>

<input
type="datetime-local"
name="arrival_datetime"
class="form-control"
value="<?= date('Y-m-d\TH:i',strtotime($trip['arrival_datetime'])) ?>">

</div>

<div class="mb-3">

<label class="form-label">Places totales</label>

<input
type="number"
name="total_seats"
class="form-control"
value="<?= $trip['total_seats'] ?>">

</div>

<div class="mb-3">

<label class="form-label">Places disponibles</label>

<input
type="number"
name="available_seats"
class="form-control"
value="<?= $trip['available_seats'] ?>">

</div>

<button class="btn btn-success">

Enregistrer

</button>

<a href="<?= BASE_URL ?>trips" class="btn btn-secondary">

Annuler

</a>

</form>