<div class="formeditalerte">
	<form action="index.php?action=editcategory" method="post">
		<div class="form-group col-md-4 col-md-offset-4">
			<label for="name">Modification de la catégorie :</label>
			<input type="text" class="form-control" name="name" id="name" value="<?= $monObjet->getName() ?>" required>
		</div>
		<div class="col-md-1 col-md-offset-4">
			<input type='text' name='id' value='<?= $monObjet->getId() ?>' hidden>
			<input class='btn btn-primary btn-secondary' type='submit' value='Modifier'>
		</div>
	</form>
</div>