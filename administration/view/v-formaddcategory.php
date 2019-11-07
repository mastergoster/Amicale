
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/bower_components/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/bower_components/bootstrap/dist/css/bootstrap.min.css" />

<div class="formaddcategory">
	<form action="index.php?action=addcategory" method="post">
		<div class="form-group col-md-4 col-md-offset-4">
			<label for="name">Nom de la catégorie :</label>
			<input type="text" class="form-control" name="name" id="name" required>
		</div>
		<div class="form-group col-md-4 col-md-offset-4">
			<label for="codef">Choisir un icône :</label>
			<select class="form-control" name="codef" id="codef" data-show-content="true" required>
				<?php
					foreach($mesIcones as $icone)
					{
						//echo "<option value='".$icone->getId()."'>".$icone->getIcons()."</option>";
						echo "<option data-content='".$icone->getCodef()."'>".$icone->getCodef()."</option>"
						;
						echo " <i class='fab fa-accessible-icon' style='font-size:24px'></i>";
					}
				?>
			</select>
			<input class='btn btn-primary col-md-4 col-md-offset-4' type='submit' value='Envoyer'>
		</div>
	</form>
</div>

<script src="https://kit.fontawesome.com/yourcode.js"></script>

<script>
	$('#mySelect').selectpicker();
</script>