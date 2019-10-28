<?php

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
        require_once '../model/post.php';
        require_once '../model/alerte.php';

        $monAlerte = new Alerte();
        $monMessage = $monAlerte->showAlert();

        $page = isset($_GET['p'])?($_GET['p']):(1);
        $limit = 5;
        $offsetDebut = ($page-1) * $limit;
        //$offsetFin = ($page) * $limit;

        $monPost = new Post();
        $mesPosts = $monPost->findAllPaginate($limit, $offsetDebut);
        $mesPins = $monPost->findAllByPin();
        $nbPost = $monPost->getNbPost();
        $nbPage = $nbPost / $limit;
        
        $view = 'home';
    }else{
        header('Location: ../index.php?action=formlogin');
    }
    
?>