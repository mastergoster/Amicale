<?php 

require_once "header.php";?>

<div class="formaddalert">
	<form action="index.php?action=addalerte" method="post">
		<div class="form-group col-md-4 col-md-offset-4" style='max-width: 35%;'>
			<label for="title">Titre de l'Alerte :</label>
			<input type="text" class="form-control" name="title" id="title" required>
		</div>
		<div class="form-group col-md-4 col-md-offset-4" style='max-width: 35%;'>
			<label for="message">Message de l'Alerte :</label>
			<textarea class="form-control" name="message" id="message" required rows="6"></textarea>
		</div>
		<div class="form-group col-md-2 col-md-offset-4 custom-control custom-radio">
			<label for="isactive">Activation de l'Alerte :</label>
		</div>
		<div class="form-group col-md-1 col-md-offset-4 custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="0" value="0" name="isactive" checked>
			<label class="custom-control-label" for="0">Désactivé</label>
		</div>
		<div class="form-group col-md-1 col-md-offset-4 custom-control custom-radio">
			<input type="radio" class="custom-control-input" id="1" value="1" name="isactive">
			<label class="custom-control-label" for="1">Activé</label>
		</div>
		<div class="form-group col-md-1 col-md-offset-4 custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" id="1" value="1" name="isactive" checked>
			<label class="custom-control-label" for="customSwitch1">Activation</label>
		</div>
		<div class="ta col-md-1 col-md-offset-4">
			<input class="btn btn-primary" type="submit" value="Envoyer">
		</div>
	</form>
</div>
