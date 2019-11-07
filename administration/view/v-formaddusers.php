<?php 

require_once "header.php";?>

<div class="formediteditalerte col-md-6 col-md-offset-4">
	<form action="index.php?action=addusers" method="post">
		<div class="form-group col-md-6 col-md-offset-4">
			<label for="login">Nom de l'Utilisateur :</label>
			<input type="text" class="form-control" name="login" id="login" required>
		</div>
        <div class="form-group col-md-6 col-md-offset-4">
			<label for="password">Mot de passe :</label>
			<input type="password" class="form-control" name="password" id="password" required>
		</div>
		<div class="col-md-3 col-md-offset-4">
			<input class="btn btn-primary" type="submit" value="Envoyer">
		</div>
	</form>
</div>