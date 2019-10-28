<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once '../model/alerte.php';

		$id = htmlspecialchars($_GET["id"]);
		$monObjet = new Alerte();
		$monObjet->retrieve($id);
		
		$view = "formeditalerte";

	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>