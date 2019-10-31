<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
        require_once '../model/horaire.php';
        
        $mesHoraires = array ();    

        // Instanciation de l'objet horaire
        
        $monHoraire = new Horaire();

        // Récupération de toutes les données de la table HORAIRE

        $mesHoraires = $monHoraire->findAll();

        // Affiche la vue 

        $view = 'allhoraire';
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>