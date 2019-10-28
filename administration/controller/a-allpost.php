<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {   
        if(isset($_GET['idcateg']) && !empty($_GET['idcateg'])){
            require_once '../model/post.php';
            
            $idcateg = $_GET['idcateg'];

            $mesPosts = array ();    

            // Instanciation de l'objet allpost
            
            $monPost = new Post();

            // Récupération de toutes les données de la table POST

            $mesPosts = $monPost->findAllByCategory($idcateg);

            // Affiche la vue 

            $view = 'allpost';
        }else{
            header('Location: index.php?action=allcategory');
        }
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>