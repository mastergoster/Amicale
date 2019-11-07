<form action="index.php?action=editusers" method="post">
    <div class="form-group col-md-4 col-md-offset-4">
        <label for="login">Modification de l'Utilisateur :</label>
        <input type="text" class="form-control" name="login" id="login" value="<?= $monObjet->getLogin() ?>" required>
    </div>
        <input type='text' name='id' value='<?= $monObjet->getId() ?>' hidden>
    <div class="col-md-1 col-md-offset-4">
        <input class='btn btn-primary' type='submit' value='Modifier'>
    </div>
</form>