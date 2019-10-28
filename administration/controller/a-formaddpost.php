<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
        require '../model/category.php';
        //instanciation de l'objet
        $maCategory = new Category();
        $mesCategory = array();

        $mesCategory = $maCategory->findAll();

		$view = "formaddpost";
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>