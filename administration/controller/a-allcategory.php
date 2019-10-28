<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
        require_once '../model/category.php';
        
        $mesCategory = array();    

        // Instanciation de l'objet category
        $maCategory = new Category();

        // Récupération de toutes les données de la table CATEGORY

        $mesCategory = $maCategory->findAll();

        // Affiche la vue 

        $view = 'allcategory';
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>