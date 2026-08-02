<h1 class="mb-4">Ajouter un utilisateur</h1>

<form action="<?= BASE_URL ?>users/store" method="post">

<div class="mb-3">
<label>Prénom</label>
<input type="text" name="firstname" class="form-control" required>
</div>

<div class="mb-3">
<label>Nom</label>
<input type="text" name="lastname" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Téléphone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label>Mot de passe</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Rôle</label>

<select name="role" class="form-select">

<option value="user">Utilisateur</option>
<option value="admin">Administrateur</option>

</select>

</div>

<button class="btn btn-success">
Enregistrer
</button>

<a href="<?= BASE_URL ?>users" class="btn btn-secondary">
Annuler
</a>

</form>