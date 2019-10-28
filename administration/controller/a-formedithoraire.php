<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once '../model/horaire.php'; 

		$id = htmlspecialchars($_GET["id"]);
		$monObjet = new Horaire();
		$monObjet->retrieve($id);

		$view = "formedithoraire";
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>