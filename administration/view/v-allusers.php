
<br>
<div style='text-align: center'><a href='index.php?action=formaddusers' class="btn btn-secondary">Ajouter un utilisateur</a></div>
<br>

<table class="table table-bordered table-striped col-md-4 col-md-offset-4">
	<thead>
	<tr>
		<th colspan=2>Nom de l&#039Utilisateur :</th>
	</tr>
	</thead>
	<tbody>
		<?php

			foreach($mesUsers as $users)
			{	// Cache le compte en cours dans l'administration.
				if($_SESSION['amicale']['auth']['id'] !=$users->getId())
				{
					echo '<tr><td>'.$users->getLogin().' <i class="'.$users->getPassword().'"></i>';
					echo '<td><a href="index.php?action=formeditusers&id='.$users->getId().'"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp; <a href="index.php?action=delusers&id='.$users->getId().'"><i class="far fa-trash-alt"></i></a></td></td></tr>';
				}  
			}
		?>
	</tbody>