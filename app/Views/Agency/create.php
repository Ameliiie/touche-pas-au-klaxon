<h1 class="mb-4">Ajouter une agence</h1>

<form action="<?= BASE_URL ?>agencies/store" method="post">

<div class="mb-3">

<label>Ville</label>

<input
type="text"
name="city"
class="form-control"
required>

</div>

<button class="btn btn-success">
Enregistrer
</button>

<a href="<?= BASE_URL ?>agencies" class="btn btn-secondary">
Annuler
</a>

</form>