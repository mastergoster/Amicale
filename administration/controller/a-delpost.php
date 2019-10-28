<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
		if($_SESSION['amicale']['auth']['slug'] == 'admin')
			{
				require_once "../model/post.php";

				$id = htmlspecialchars($_GET["id"]);
				$idcategory = htmlspecialchars($_GET['category']);

				$monObjet = new Post();
				$monObjet->delete($id);

			header('Location: index.php?action=allpost&idcateg='.$idcategory);
		}else{
			header('Location: index.php?action=home');
		}
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>