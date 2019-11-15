<form action="index.php?action=addhoraire" method="post">
		<div class="form-group col-md-4 col-md-offset-4">
			<label for="title">Ajouter un titre d'horaire :</label>
			<input type="text" class="form-control" name="title" id="title" required>
		</div>
        <div class="form-group col-md-4 col-md-offset-4">
			<label for="content">Contenu de l'horaire :</label>
			<input type="text" class="form-control" name="content" id="content" required>
		</div>
		<div class="form-group col-md-1 col-md-offset-4 custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="0" value="0" name="isactive" checked>
			<label class="custom-control-label" for="0">Désactivé</label>
		</div>
		<div class="form-group col-md-1 col-md-offset-4 custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="1" value="1" name="isactive">
			<label class="custom-control-label" for="1">Activé</label>
		</div>
		<div class="button_send col-md-10">
        	<input class='btn btn-primary' type='submit' value='Envoyer'>
    	</div>
</form>