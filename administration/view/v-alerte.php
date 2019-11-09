<br>
<div class="allalerte" style='text-align: center'><a href='index.php?action=formaddalerte' class="btn btn-secondary">Ajouter une alerte</a></div>
<br>

	<table class="col-md-8 col-md-offset-4 table table-bordered table-striped">
		<thead>
		<tr>
			<th>Titre</th>
			<th>Message</th>
			<th>Activation</th>
			<th>Modification</th>
			<th>Suppression</th>
		</tr>
		</thead>
		<tbody>
			<?php
				foreach($mesAlertes as $alerte)
				{		
					echo '<tr><td>'.$alerte->getTitle().'</td>';
					echo '<td>'.$alerte->getMessage().'</td>';
					echo '<td>'.$alerte->getIsActive().'</td>';					
					echo '<td><a href="index.php?action=formeditalerte&id='.$alerte->getId().'"><i class="far fa-edit"></i></a></td>';
					echo '<td><a href="index.php?action=delalerte&id='.$alerte->getId().'"><i class="far fa-trash-alt"></i></a></td></tr>';
				}
				if(count($mesAlertes) == 0)
				{
					echo "<tr><td colspan=6>Aucunes Alertes</td></tr>";
				}
			?>
		</tbody>
	</table>
	<br>