<br>
	<div style='text-align: center'><a href='index.php?action=formadddiffusion' class="btn btn-secondary">Ajouter un mois de diffusion</a></div>
<br>

<table class="table table-bordered table-striped col-md-4 col-md-offset-4">
	<thead>
		<tr>
			<th colspan=2>Nom de la diffusion :</th>
		</tr>
	</thead>
	<tbody>
		<?php

			foreach($mesDiffusions as $diffusion)
			{
				echo '<tr><td>'.$diffusion->getMonth().'</td>';
				echo '<td><div class="categorymanage"><a href="index.php?action=formeditdiffusion&id='.$diffusion->getId().'"><i class="far fa-edit"></i></a></a>&nbsp;&nbsp;&nbsp; <a href="index.php?action=deldiffusion&id='.$diffusion->getId().'"><i class="far fa-trash-alt"></i></a></div></td></tr>';
			}
		?>
	</tbody>