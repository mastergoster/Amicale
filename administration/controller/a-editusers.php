<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once "../model/users.php";

		$id = htmlspecialchars($_POST["id"]);
		$login = htmlspecialchars($_POST["login"]);
		$password = htmlspecialchars($_POST["password"]);

		$monObjet = new Users($id, $login, $password);
		$monObjet->update();

		header('Location: index.php?action=allusers');
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>