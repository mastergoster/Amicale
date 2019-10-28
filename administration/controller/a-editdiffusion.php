<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
		require_once "../model/horaire.php";
		require_once "../model/category.php";
		require_once "../model/diffusion.php";

		$id = htmlspecialchars($_POST["id"]);
		$idhoraire = htmlspecialchars($_POST["horaire"]);
		$monHoraire = new Horaire();
		$monHoraire->retrieve($idhoraire);

		$month = htmlspecialchars($_POST["month"]);
		$alerte = htmlspecialchars($_POST["idalerte"]); // récupère le name='idalerte' de v-formeditdiffusion.php

		if($alerte != null){
			$monAlerte = new Alerte();
			$monAlerte->retrieve($alerte);
		}else{
			$alerte = NULL;
		}

		$monObjet = new Diffusion($id, $alerte, $monHoraire, $month);
		$monObjet->update();

		header('Location: index.php?action=alldiffusion&idhor='.$idhoraire);
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>