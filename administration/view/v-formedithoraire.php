<form action="index.php?action=edithoraire" method="post">
		<div class="form-group col-md-4 col-md-offset-4">
			<label for="title">Modification du titre de l'horaire :</label>
			<input type="text" class="form-control" name="title" id="title" value="<?= $monObjet->getTitle() ?>" required>
		</div>
		<input type='text' name='id' value='<?= $monObjet->getTitle() ?>' hidden>
        <div class="form-group col-md-4 col-md-offset-4">
			<label for="content">Modification du contenu de l'horaire :</label>
			<input type="text" class="form-control" name="content" id="content" value="<?= $monObjet->getContent() ?>" required>
		</div>
		<input type='text' name='id' value='<?= $monObjet->getId() ?>' hidden>
	<div class="col-md-1 col-md-offset-4">
		<input class='btn btn-primary btn-secondary' type='submit' value='Modifier'>
	</div>
</form>