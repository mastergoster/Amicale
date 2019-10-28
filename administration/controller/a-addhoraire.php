<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {   
        // Autorise uniquement le compte admin
        if($_SESSION['amicale']['auth']['slug'] == 'admin')
        {
            require_once "../model/horaire.php";

            $title = htmlspecialchars($_POST["title"]);
            $content = htmlspecialchars($_POST["content"]);
    
            $monObjet = new Horaire(0, $title, $content);
            $monObjet->create();

            header('Location: index.php?action=allhoraire');
        }else{
            // si pas admin, redirige vers home
            header('Location: index.php?action=home');
        }
    }else{
        header('Location: ../index.php?action=formlogin');
    }
    
?>