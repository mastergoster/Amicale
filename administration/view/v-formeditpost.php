<form action="index.php?action=editpost" method="post" enctype="multipart/form-data">
		<div class="form-group col-md-4 col-md-offset-4">
			<label for="title">Nom de l'Article :</label>
			<select class="form-control" name="category" id="category" required>
                <?php
                    foreach($mesCategory as $category)
                    {
                        echo "<option value='".$category->getId()."'"; echo ($category->getId() == $monObjet->getCategory()->getId())?(" selected"):("") ; echo ">".$category->getName()."</option>";
                    }
                ?>
            </select>
		</div>
        <div class="form-group col-md-4 col-md-offset-6">
			<label for="title">Titre de l'Article :</label>
            <input type='text' name='title' size='30' value='<?= $monObjet->getTitle() ?>'>
		</div>
        <div class="form-group col-md-4 col-md-offset-4">
			<label for="content">Contenu de l'Article :</label>
			<textarea type='text' rows ='6'cols='30' name='content'><?= $monObjet->getContent() ?></textarea>
		</div>
        <div class="form-group col-md-4 col-md-offset-4">
			<label for="datepost">Date de l'Article :</label>
			<input type='text' name='datepost' size='30' value='<?= $monObjet->getDatePost() ?>'>
		</div>
		<div class="picture col-md-4 col-md-offset-4">
			<label for="picture">Photo de l'Article (jpg, jpeg, png, gif):</label>
		</div>
		<div class="input-group mb-3 col-md-4 col-md-offset-4">
			<div class="input-group-prepend">
				<span class="input-group-text">Télécharger</span>
			</div>
			<div class="custom-file" id="customFile" lang="fr">
				<input type="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg,,image/jpg" name="picture" id="picture" value='<?= $monObjet->getPicture() ?>'>
				<label class="custom-file-label" for="picture"><?= $monObjet->getPicture() ?></label>
			</div>
		</div>
		<div class="picture col-md-4 col-md-offset-4">
			<label for="file">Fichier (pdf, doc, docx) :</label>
		</div>
		<div class="input-group mb-3 col-md-4 col-md-offset-4">
			<div class="input-group-prepend">
				<span class="input-group-text">Télécharger</span>
			</div>
			<div class="custom-file">
				<input type="file" class="custom-file-input" accept=".doc,.docx, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, pdf" name="file" id="file" value='<?= $monObjet->getFile() ?>'>
				<label class="custom-file-label" for="file">Choisir un fichier</label>
			</div>
		</div>
		<div class="checkedcenter">
			<div class="form-check form-check-inline ">
				<input class="form-check-input" type="checkbox" id="pin" name="pin">
				<label class="form-check-label" for="pin">Cocher la case pour épingler l'article</label>
			</div>
		</div>
		<div class="button_send">
			<input class='btn btn-primary btn-secondary' type='submit' value='Envoyer'>
		</div>
		<div>
			<!-- Cache l'ID aux utilisateurs mais est utile pour modifier cette article -->
			<input type='text' name='id' value='<?= $monObjet->getId() ?>' hidden>
			<!-- Cache le nom de la photo aux utilisateurs mais conserve l'extension -->
			<input type='text' name='pictureOldName' value='<?= $monObjet->getPicture() ?>' hidden>
			<!-- Cache le nom de la photo aux utilisateurs mais conserve l'extension -->
			<input type='text' name='fileOldName' value='<?= $monObjet->getFile() ?>' hidden>
		</div>
	</form>