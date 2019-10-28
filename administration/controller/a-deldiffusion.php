<?php

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
		require_once "../model/diffusion.php";

		$id = $_GET["id"];
	
		$monObjet = new Diffusion();
		$monObjet->delete($id);
	
		header('Location: index.php?action=alldiffusion');
    }else{
        header('Location: ../index.php?action=formlogin');
	}
		
?>