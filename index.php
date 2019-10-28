<?php
session_start();
    // *** traitement de l'action ***
    //si contracté  $action = (isset($_GET['action']) && !empty($_GET['action']))?(strtolower($_GET['action'])):('home');
        if(isset($_GET['action']) && !empty($_GET['action'])){
            $action = strtolower($_GET['action']);
        }else{
            $action = 'home';
        }
        
        $scriptAction = 'controller/a-' . $action . '.php';

        if(file_exists($scriptAction)){
            include $scriptAction;

            // Ajout du header
                include "view/header.php";
        
            // *** génération de la vue ***
                $scriptVue = 'view/v-' . $view . '.php';
                include $scriptVue;
        
            // Ajout du footer
                include 'view/footer.php';
        }else {
            header('Location: error.php');
        }
