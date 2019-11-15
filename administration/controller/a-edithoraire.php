<?php 

	if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
	{
        require_once "../model/horaire.php";
        
		$id = htmlspecialchars($_POST["id"]);
		$title = htmlspecialchars($_POST["title"]);
		$content = htmlspecialchars($_POST["content"]);
		$isactive = htmlspecialchars($_POST["isactive"]);

		$monObjet = new Horaire($id, $title, $content, $isactive);
		$monObjet->update();
		header('Location: index.php?action=allhoraire');
	}else{
		header('Location: ../index.php?action=formlogin');
	}

?>