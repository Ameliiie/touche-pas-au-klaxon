<h1 class="mb-4">Modifier un utilisateur</h1>

<form action="<?= BASE_URL ?>users/update" method="post">

<input type="hidden" name="id" value="<?= $user['id'] ?>">

<div class="mb-3">
<label>Prénom</label>
<input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($user['firstname']) ?>" required>
</div>

<div class="mb-3">
<label>Nom</label>
<input type="text" name="lastname" class="form-control" value="<?= htmlspecialchars($user['lastname']) ?>" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
</div>

<div class="mb-3">
<label>Téléphone</label>
<input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>" required>
</div>

<div class="mb-3">
<label>Rôle</label>

<select name="role" class="form-select">

<option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>
Utilisateur
</option>

<option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>
Administrateur
</option>

</select>

</div>

<button class="btn btn-success">
Enregistrer
</button>

<a href="<?= BASE_URL ?>users" class="btn btn-secondary">
Annuler
</a>

</form>