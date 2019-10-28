<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
        require_once '../model/diffusion.php';
        
        $mesDiffusions = array();    

        // Instanciation de l'objet diffusion
        $maDiffusion = new Diffusion();

        // Récupération de toutes les données de la table DIFFUSION

        $mesDiffusions = $maDiffusion->findAll();

        // Affiche la vue 

        $view = 'alldiffusion';
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>