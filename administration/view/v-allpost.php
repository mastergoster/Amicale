<br>
	<div style='text-align: center'><a href='index.php?action=formaddpost' class="btn btn-secondary">Ajouter un article</a></div>
<br>

<table class="col-md-8 col-md-offset-4 table table-bordered table-striped">
	<thead>
		<tr>
			<th>Titre de l'Article</th>
			<th>Contenu de l'Article</th>
			<th>Date de l'Article</th>
			<th>Photo de l'Article</th>
			<th>Fichier Téléchargé</th>
			<th>Activer</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$counter=0;
			
			foreach($mesPosts as $post)
			{				
				echo '<tr><td>'.$post->getTitle().'</td>';
				echo '<td>'.substr(strip_tags($post->getContent()), 0, 130).'...</td>';
				echo '<td>'.$post->getDatePost().'</td>';
				echo '<td>'.$post->getPicture().'</td>';
				echo '<td>'.$post->getFile().'</td>';
				echo '<td>'.$post->getPin().'</td>';
				
				echo '<td><a href="index.php?action=formeditpost&id='.$post->getId().'"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp; <a href="index.php?action=delpost&id='.$post->getId().'&category='.$post->getCategory()->getId().'"><i class="far fa-trash-alt"></i></a></td></tr>';
			}
			if(count($mesPosts) == 0)
			{
				echo "<tr><td colspan=6>Aucun posts</td></tr>";
			}			
		?>
	</tbody>
	</table>
	<br>