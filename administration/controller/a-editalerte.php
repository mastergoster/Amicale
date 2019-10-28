<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once "../model/alerte.php";

		$id = htmlspecialchars($_POST["id"]);
		$title = htmlspecialchars($_POST["title"]);
		$message = htmlspecialchars($_POST["message"]);
		$isactive = htmlspecialchars($_POST["isactive"]);

		$monObjet = new Alerte($id, $title, $message, $isactive);
		$monObjet->update();

		header('Location: index.php?action=allalerte');
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>