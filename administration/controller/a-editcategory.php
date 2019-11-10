<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once "../model/category.php";

		$id = htmlspecialchars($_POST["id"]);
		$name = htmlspecialchars($_POST["name"]);
		$alerte = htmlspecialchars($_POST["alerte"]);
		$icons = htmlspecialchars($_POST["icons"]);

		$monObjet = new Category($id, NULL, NULL, $name, $icons);
		$monObjet->update();

		header('Location: index.php?action=allcategory');
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>