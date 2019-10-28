<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once '../model/icons.php';
		
		$monIcone = new Icone();
		$mesIcones = array();
		$mesIcones = $monIcone->findAll();

		$view = "formaddcategory";

	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>