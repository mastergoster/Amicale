<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once '../model/category.php'; 

		$id = htmlspecialchars($_GET["id"]);
		$monObjet = new Category();
		$monObjet->retrieve($id);
		
		$view = "formeditcategory";
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>