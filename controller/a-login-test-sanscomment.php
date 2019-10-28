<?php
    if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $login = htmlspecialchars($_POST['login']);
        $password = sha1(htmlspecialchars($_POST['password']));
        require 'model/users.php';
        $monUSer = new Users ();

        $canConnect = $monUser->canConnect($login, $password);
        
        if ($canConnect)
            {
            $_SESSION['amicale']['auth']=array(
                "login" => $login
            );

                header('Location: administration/index.php?action=home');
            }else{
                header('Location: index.php?action=formlogin');
        }
        }else{
            header('Location: index.php?action=formlogin');
        }
    
    ?>