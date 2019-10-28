<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {   
        // Autorise uniquement le compte admin
        if($_SESSION['amicale']['auth']['slug'] == 'admin')
        {
            require_once "../model/alerte.php";

            $title = htmlspecialchars($_POST["title"]);
            $message = htmlspecialchars($_POST["message"]);
            $isactive = htmlspecialchars($_POST["isactive"]);
    
            $monObjet = new Alerte(0, $title, $message, $isactive);
            $monObjet->create();

            header('Location: index.php?action=allalerte');
        }else{
            // si pas admin, redirige vers home
            header('Location: index.php?action=home');
        }
    }else{
        header('Location: ../index.php?action=formlogin');
    }
    
?>