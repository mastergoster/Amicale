<?php 

	if(isset($_SESSION['amicale']) && !empty($_SESSION['amicale']['auth']))
	{
		require_once '../model/category.php';
		require_once '../model/post.php';

		$id = htmlspecialchars($_GET["id"]);
		$monObjet = new Post();
		$monObjet->retrieve($id);
		
		$maCategory = new Category();
        $mesCategory = array();

        $mesCategory = $maCategory->findAll();
        
		$view = "formeditpost";
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>