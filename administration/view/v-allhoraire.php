<br>
	<div style='text-align: center'><a href='index.php?action=formaddhoraire' class="btn btn-secondary">Ajouter un horaire</a></div>
<br>

<table class="table table-bordered table-striped col-md-5 col-md-offset-4">
	<thead>
		<tr>
			<th>Titre de l'Horaire :</th>
			<th>Contenu de l'Horaire :</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php

			foreach($mesHoraires as $horaire)
			{
				echo '<tr><td>'.$horaire->getTitle().'</td>';
				echo '<td>'.$horaire->getContent().'</td>';
				
				echo '<td><a href="index.php?action=formedithoraire&id='.$horaire->getId().'"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp; <a href="index.php?action=delhoraire&id='.$horaire->getId().'"><i class="far fa-trash-alt"></i></a></td></tr>';
			}

			if(count($mesHoraires) == 0)
			{
				echo "<tr><td colspan=6>Aucun posts</td></tr>";
			}

		?>
	</tbody>