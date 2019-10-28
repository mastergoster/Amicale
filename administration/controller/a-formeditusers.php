<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once '../model/users.php'; 

		$id = htmlspecialchars($_GET["id"]);
		$monObjet = new Users();
		$monObjet->retrieve($id);
		
		$view = "formeditusers";
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>