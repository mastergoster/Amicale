<form action="index.php?action=adddiffusion" method="post">
<div class="form-group">
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
<div class="form-group">
<label for="month">Mois de la diffusion :</label>
<input type="text" class="form-control" name="month" id="month" required>
</div>
<input class='btn btn-primary' type='submit' value='Envoyer'>
</form>