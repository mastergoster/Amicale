<?php
//session_start();
// echo sha1('admin'); <-- permet de créer un code sh1 et l'intégrer dans la BDD pour le test
// Si les champs existent et ne sont pas vident alors ok
//Sinon redirection vers le formulaire login
    if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $login = htmlspecialchars($_POST['username']);
        $password = sha1(htmlspecialchars($_POST['password']));

        require 'model/users.php';
        $monUser = new Users(); // créer une instance vide

        // Vérification de la connexion retourne True or False
        $canConnect = $monUser->canConnect($login, $password);

        // Vérifie si c'est égale à true

        if ($canConnect){
            // Objet utilisateur remplie
            $monUser->retrieveByLogin($login);

            // Permet de récupèrer les attributs getId et getLogin
            $_SESSION['amicale']['auth']=array(
                "id" => $monUser->getId(),            
                "login" => $monUser->getLogin(),
                "slug" => $monUser->getSlug()
            );
            //echo 'connecté';
            header("Location: administration/index.php?action=home");

        }else{
             //echo 'pas connecté';
            header("Location: index.php?action=formlogin");
        }
    }else{
        header("Location: index.php?action=formlogin");
    }  