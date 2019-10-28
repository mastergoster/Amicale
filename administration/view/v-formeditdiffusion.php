<form action="index.php?action=editdiffusion" method="post">

<div class="form-group  col-md-4 col-md-offset-4">
    <label for="horaire">Diffusion :</label>
    <select class="form-control" name="horaire" id="horaire" required>
                <?php
                    foreach($mesHoraires as $horaire)
                    {
                        echo "<option value='".$horaire->getId()."'>".$horaire->getTitle()."".$horaire->getContent()."</option>";
                    }
                ?>
            </select>
</div>
<div class="form-group col-md-4 col-md-offset-4">
    <label for="month">Modification du mois de diffusion :</label>
    <input type="text" class="form-control" name="month" id="month" value="<?= $monObjet->getMonth() ?>" required>
</div>
    <input type='text' name='id' value='<?= $monObjet->getId() ?>' hidden>
    <input type='text' name='idalerte' value='<?= ($monObjet->getAlerte()->getId() != NULL)?($monObjet->getAlerte()->getId()):(NULL); ?>' hidden>
<div class="col-md-1 col-md-offset-4">
    <input class='btn btn-primary' type='submit' value='Modifier'>
</div>
</form>