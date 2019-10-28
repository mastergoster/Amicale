<?php

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
		if($_SESSION['amicale']['auth']['slug'] == 'admin'){
			
			if($_GET["id"] !=$_SESSION['amicale']['auth']['id'])
			{
				require_once "../model/users.php";

				$id = htmlspecialchars($_GET["id"]);
		
				$monObjet = new Users();
				$monObjet->delete($id);				
			}
			header('Location: index.php?action=allusers');
		}else{
			header('Location: index.php?action=home');
		}
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>