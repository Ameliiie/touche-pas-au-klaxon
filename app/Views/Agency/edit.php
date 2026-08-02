<h1 class="mb-4">Modifier une agence</h1>

<form action="<?= BASE_URL ?>agencies/update" method="post">

<input
type="hidden"
name="id"
value="<?= $agency['id'] ?>">

<div class="mb-3">

<label>Ville</label>

<input
type="text"
name="city"
class="form-control"
value="<?= htmlspecialchars($agency['city']) ?>"
required>

</div>

<button class="btn btn-success">
Enregistrer
</button>

<a href="<?= BASE_URL ?>agencies" class="btn btn-secondary">
Annuler
</a>

</form>