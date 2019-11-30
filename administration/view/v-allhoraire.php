<br>
	<div style='text-align: center'><a href='index.php?action=formaddhoraire' class="btn btn-secondary">Ajouter un horaire</a></div>
<br>

<table class="table table-bordered table-striped col-md-8 col-md-offset-4 tableMobileOff">
	<thead>
		<tr>
			<th th-lg >Titre</th>
			<th th-lg >Contenu</th>
			<th th-lg >Activé</th>
			<th>Modification</th>
			<th>Suppression</th>
		</tr>
	</thead>
	<tbody>
		<?php

			foreach($mesHoraires as $horaire)
			{
				echo '<tr><td>'.$horaire->getTitle().'</td>';
				echo '<td>'.$horaire->getContent().'</td>';
				echo '<td>'.$horaire->getIsactive().'</td>';				
				echo '<td><a href="index.php?action=formedithoraire&id='.$horaire->getId().'"><i class="far fa-edit"></i></a></td>';
				echo '<td><a href="index.php?action=delhoraire&id='.$horaire->getId().'"><i class="far fa-trash-alt"></i></a></td></tr>';

			}

			if(count($mesHoraires) == 0)
			{
				echo "<tr><td colspan=6>Aucun posts</td></tr>";
			}

		?>
	</tbody>
</table>


<table class="table table-bordered table-striped col-md-8 col-md-offset-4 tableFullScreenOff">
	<tbody class="tableAdminMobile">
		<?php

			foreach($mesHoraires as $horaire)
			{
				echo '<td>'.$horaire->getContent().'</td>';
				echo '<td><a href="index.php?action=formedithoraire&id='.$horaire->getId().'"><i class="far fa-edit"></i></a></td>';
				echo '<td><a href="index.php?action=delhoraire&id='.$horaire->getId().'"><i class="far fa-trash-alt"></i></a></td></tr>';

			}

			if(count($mesHoraires) == 0)
			{
				echo "<tr><td colspan=6>Aucun posts</td></tr>";
			}

		?>
	</tbody>
</table>

<br>