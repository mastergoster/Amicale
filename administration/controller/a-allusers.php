<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
        require_once '../model/users.php';
        
        $mesUsers = array ();    

        // Instanciation de l'objet allusers
        $monUser = new Users();

        // Récupération de toutes les données de la table USERS

        $mesUsers = $monUser->findAll();

        // Affiche la vue 

        $view = 'allusers';
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>