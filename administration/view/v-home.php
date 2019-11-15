<div class="card mb-3"></div>Bienvenue <?= $_SESSION['amicale']['auth']['login'] ?>, vous êtes bien connecté.</div>
<br>
	<div style='text-align: center'><a href='index.php?action=formaddpost' class="btn btn-secondary">Ajouter un article</a></div>
<br>

<table class="table table-bordered table-striped compact" id="myTable">
	<thead>
		<tr>
			<th>Catégorie</th>
			<th>Titre</th>
			<th>Contenue</th>
			<th>Date</th>
			<th>Photo</th>
			<th>Activé</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$counter=0;
			
			foreach($mesPosts as $post)
			{		
				echo '<tr><td>'.$post->getCategory()->getName().'</td>';
				echo '<td>'.$post->getTitle().'</td>';
				echo '<td>'.substr(strip_tags($post->getContent()), 0, 50).'...</td>';
				echo '<td>'.$post->getDatePost().'</td>';
				echo '<td class="td_image"><img src=../assets/uploads/picture/'.$post->getPicture().'></td>';
				if ($post->getPin() != 0){
					echo '<td><i class="fas fa-check"></i></td>';
				}else{
					echo '<td><i class="fas fa-times"></i></i></td>';
				}
				echo '</td>';
				echo '<td><a href="index.php?action=formeditpost&id='.$post->getId().'"><i class="far fa-edit"></i></a>
						<td><a href="index.php?action=delpost&id='.$post->getId().'&category='.$post->getCategory()->getId().'"><i class="far fa-trash-alt"></i></a></td></tr>';
			}
			if(count($mesPosts) == 0)
			{
				echo "<tr><td colspan=6>Aucun posts</td></tr>";
			}			
		?>

		<script>
			$(document).ready( function () {
			$('#myTable').DataTable();
			} );
		</script>
	</tbody>
	</table>
	<br>