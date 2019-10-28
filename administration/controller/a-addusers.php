<?php 

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {   
        // Autorise uniquement le compte admin
        if($_SESSION['amicale']['auth']['slug'] == 'admin')
        {
            require_once "../model/users.php";

            $login = htmlspecialchars($_POST["login"]);
            $password = htmlspecialchars($_POST["password"]);
    
            $monObjet = new Users(0, $login, $password);
            $monObjet->create();
    
            header('Location: index.php?action=allusers');
        }else{
            // si pas admin, redirige vers home
            header('Location: index.php?action=home');
        }
    }else{
        header('Location: ../index.php?action=formlogin');
    }

?>