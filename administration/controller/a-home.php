<?php

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
        require_once '../model/post.php';
        require_once '../model/alerte.php';

        $monAlerte = new Alerte();
        $monMessage = $monAlerte->showAlert();


        $monPost = new Post();
        $mesPosts = $monPost->findAll();

        
        $view = 'home';
    }else{
        header('Location: ../index.php?action=formlogin');
    }
    
?>