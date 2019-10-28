<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
		if($_SESSION['amicale']['auth']['slug'] == 'admin')
			{
				require_once "../model/horaire.php";

				$id = htmlspecialchars($_GET["id"]);

				$monObjet = new Horaire();
				$monObjet->delete($id);

			header('Location: index.php?action=allhoraire');
		}else{
			header('Location: index.php?action=home');
		}
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>