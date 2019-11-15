<br>
	<div style='text-align: center'><a href='index.php?action=formaddpost' class="btn btn-primary btn-secondary">Ajouter un article</a></div>
<br>

<table class="col-md-8 col-md-offset-4 table table-bordered table-striped">
	<thead>
		<tr>
			<th>Catégorie</th>			
			<th>Titre</th>
			<th>Contenu</th>
			<th>Date</th>
			<th>Photo</th>
			<th>Fichier Téléchargé</th>
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
				echo '<td>'.substr(strip_tags($post->getContent()), 0, 130).'...</td>';
				echo '<td>'.$post->getDatePost().'</td>';
				echo '<td>'.$post->getPicture().'</td>';
				echo '<td>'.$post->getFile();
				if ($post->getFile() != ""){
					echo '<a href="index.php?action=deletefile&id='.$post->getId().'"> <i class="far fa-trash-alt"></i></a>';
				}

				if ($post->getPin() != 0){
					echo '<td><i class="fas fa-check"></i></td>';
				}else{
					echo '<td><i class="fas fa-times"></i></i></td>';
				}
				echo '</td>';
				
				echo '<td><a href="index.php?action=formeditpost&id='.$post->getId().'"><i class="far fa-edit"></i></a>';
				echo '<td><a href="index.php?action=delpost&id='.$post->getId().'&category='.$post->getCategory()->getId().'"><i class="far fa-trash-alt"></i></a></td></<td>';
			}
			if(count($mesPosts) == 0)
			{
				echo "<tr><td colspan=6>Aucun posts</td></tr>";
			}			
		?>
	</tbody>
	</table>
	<br>