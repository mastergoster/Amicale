<form action="index.php?action=addpost" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-4">
        <label for="category">Catégorie :</label>
        <select class="form-control" name="category" id="category" required>
            <?php
            foreach($mesCategory as $category)
            {
                echo "<option value='".$category->getId()."'>".$category->getName()."</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="title">Titre de l'Article:</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>

    <div class="form-group col-md-4">
        <label for="content">Contenu de l'Article :</label>
        <textarea class="form-control" name="content" id="content" ></textarea>
    </div>

    <div class="form-group col-md-4">
        <label for="datepost">Date de l'Article :</label>
        <input type="date" placeholder="aaaa/mm/jj" class="form-control" name="datepost" id="datepost" required>
    </div>
    
    <div class="picture col-md-6">
        <label for="picture">Photo de l'Article (Formats supportés : jpg, jpeg, png, gif) :</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" onchange="return onChangeFileInput(this);" name="picture" id="picture" accept="image/x-png,image/gif,image/jpeg,,image/jpg" required>
            <label class="custom-file-label" or="customFileLangHTML" data-browse="Parcourir">Choisir un fichier</label>
        </div>
    </div>

    <div class="picture col-md-6">
        <label for="file">Fichier de l'article (Formats supportés : pdf, doc, docx) :</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" onchange="return onChangeFileInput(this);" name="file" id="file" accept=".doc,.docx, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, pdf">
            <label class="custom-file-label" or="customFileLangHTML" data-browse="Parcourir">Choisir un fichier</label>
        </div>
    </div>

    <div class="checkedcenter">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="pin" name="pin">
            <label class="form-check-label" for="pin">Cocher la case pour épingler l'article</label>
        </div>
    </div>
    
    <div class="button_send col-md-10">
        <input class='btn btn-primary' type='submit' value='Envoyer'>
    </div>
</form>

<script>
function onChangeFileInput(elem){
  var sibling = elem.nextSibling.nextSibling;
  sibling.innerHTML=elem.value;
  return true;
}
</script>