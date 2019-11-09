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
        <textarea class="form-control" name="content" id="content" required ></textarea>
    </div>

    <div class="form-group col-md-4">
        <label for="datepost">Date de l'Article :</label>
        <input type="date" placeholder="aaaa/mm/jj" class="form-control" name="datepost" id="datepost" required>
    </div>

<div class="picture col-md-6">
<label for="picture">Photo de l'Article (Formats supportés : jpg, jpeg, png, gif):</label>
<div class="input-group mb-3">

<div class="input-group-prepend">
<span class="input-group-text">Télécharger</span>
</div>

<div class="custom-file">
    <input type="file" class="custom-file-input" name="picture" id="picture" accept="image/x-png,image/gif,image/jpeg,,image/jpg" required>
    <label class="custom-file-label" for="picture">Choisir un fichier</label>
</div>

</div>

<label for="file">Fichier (Formats supportés : pdf, doc, docx) :</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Télécharger</span>
        </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="file" id="file" accept=".doc,.docx, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, pdf">
        <label class="custom-file-label" for="file">Choisir un fichier</label>
    </div>
    </div>
    <div class="checkedcenter">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="pin" name="pin">
            <label class="form-check-label" for="pin">Cocher la case pour épingler l'article</label>
        </div>
    </div>
    <div class="col-md-4">
        <input class='btn btn-primary' type='submit' value='Envoyer'>
    </div>
</form>

<script>
// Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>