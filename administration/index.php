<?php
session_start();
    // *** traitement de l'action ***
    //si contracté    $action = (isset($_GET['action']) && !empty($_GET['action']))?(strtolower($_GET['action'])):('home');
        if(isset($_GET['action']) && !empty($_GET['action'])){
            $action = strtolower($_GET['action']);
        }else{
            $action = 'home';
        }
        
        $scriptAction = 'controller/a-' . $action . '.php';

        if(file_exists($scriptAction)){
            
            $verifpost = ['add', "del", "edi"];
            if(in_array(substr($action, 0, 3), $verifpost)){
                
               if(!empty($_POST)){
                include $scriptAction;
               }else{
                   if(substr($action, 0, 4)=="edit"){
                    header('Location: index.php?action=all'.substr($action, 4));
                   }else{
                    header('Location: index.php?action=all'.substr($action, 3));
                   }
                
               }
            }else{
                include $scriptAction;
            }

            // Ajout du header
                include "view/header.php";
        
            // *** génération de la vue ***
                $scriptVue = 'view/v-' . $view . '.php';
                include $scriptVue;
        
            // Ajout du footer
                include 'view/footer.php';
        }else {
            header('Location: ../error.php');
        }


?>