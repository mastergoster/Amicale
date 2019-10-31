<?php

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
    require_once "../model/alerte.php";

    $id = $_GET["id"];

    $monObjet = new Alerte();
    $monObjet->delete($id);

    header('Location: index.php?action=allalerte');
    
    }else{

    header('Location: ../index.php?action=formlogin');

    }

?>