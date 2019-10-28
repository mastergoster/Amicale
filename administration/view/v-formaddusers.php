	<form action="index.php?action=addusers" method="post">
		<div class="form-group">
			<label for="login">Nom de l'Utilisateur:</label>
			<input type="text" class="form-control" name="login" id="login" required>
		</div>
        <div class="form-group">
			<label for="password">Mot de passe :</label>
			<input type="password" class="form-control" name="password" id="password" required>
		</div>
		<input class='btn btn-primary' type='submit' value='Envoyer'>
	</form>