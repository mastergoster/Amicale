<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once '../model/diffusion.php';
		require_once '../model/horaire.php';

		$id = htmlspecialchars($_GET["id"]);
		$monObjet = new Diffusion();
		$monObjet->retrieve($id);

		$monHoraire = new Horaire();
        $mesHoraires = array();

        $mesHoraires = $monHoraire->findAll();

		$view = "formeditdiffusion";
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>