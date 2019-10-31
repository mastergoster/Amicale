<?php
    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
        // Autorise uniquement le compte admin
        if($_SESSION['amicale']['auth']['slug'] == 'admin')
            {
                $name = htmlspecialchars($_POST["name"]);
                $codef = htmlspecialchars($_POST["codef"]);

                require_once "../model/icons.php";
                $monIcone = new Icone();
                $monIcone->retrieveByCodef($codef);

                require_once "../model/category.php";
                $monObjet = new Category(0, $monIcone, null, $name);
                $monObjet->create();
            
                header('Location: index.php?action=allcategory');
            }else{
                // si pas admin, redirige vers home
                header('Location: index.php?action=home');
            }
            }else{
            header('Location: ../index.php?action=formlogin');
    }
?>