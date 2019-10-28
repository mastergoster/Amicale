<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
        require_once '../model/alerte.php';
        
        $mesAlertes = array ();    

        // Instanciation de l'objet alerte
        
        $monAlerte = new Alerte();

        // Récupération de toutes les données de la table ALERT

        $mesAlertes = $monAlerte->findAll();

        // Affiche la vue 

        $view = 'alerte';
    }else{
    header('Location: ../index.php?action=formlogin');
}

?>