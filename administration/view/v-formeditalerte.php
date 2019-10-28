	<div class="formediteditalerte col-md-6 col-md-offset-4">
	<form action="index.php?action=editalerte" method="post">
		<div class="form-group">
			<label for="title">Titre de l'Alerte :</label>
			<input type="text" class="form-control" name="title" id="title" value="<?= $monObjet->getTitle() ?>" required>
		</div>
        <div class="form-group">
			<label for="message">Message de l'Alerte :</label>
			<input type="text" class="form-control" name="message" id="message" value="<?= $monObjet->getMessage() ?>" required>
		</div>

		<div class="custom-control custom-radio col-md-3 col-md-offset-4">
			<label for="isactive">Activation de l'Alerte :</label>
		</div>
		<div class="custom-control custom-radio col-md-2 col-md-offset-4">
			<input type="radio" class="custom-control-input" id="1" value="1" name="isactive" <?= ($monObjet->getIsactive() == 1)?('checked'):(''); ?>>
			<label class="custom-control-label" for="1">Activé</label>
		</div>

		<div class="custom-control custom-radio col-md-2 col-md-offset-4">
			<input type="radio" class="custom-control-input" id="0" value="0" name="isactive" <?= ($monObjet->getIsactive() == 1)?('checked'):(''); ?>>
			<label class="custom-control-label" for="0">Désactivé</label>
		</div>
		<div class="ta col-md-2 col-md-offset-2">
			<input class='btn btn-primary' type='submit' value='Modifier'>
		</div>
			<!-- Permet d'envoyer l'id récuperer du lien-->
			<input type="text" name="id" id="id" value="<?= $monObjet->getId() ?>" hidden>
		</div>
	</form>
	</div>