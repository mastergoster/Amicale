<form action="index.php?action=addhoraire" method="post">
		<div class="form-group">
			<label for="title">Ajouter un titre d'horaire :</label>
			<input type="text" class="form-control" name="title" id="title" required>
		</div>
        <div class="form-group">
			<label for="content">Contenu de l'horaire :</label>
			<input type="text" class="form-control" name="content" id="content" required>
		</div>
		<input class='btn btn-primary' type='submit' value='Envoyer'>
</form>