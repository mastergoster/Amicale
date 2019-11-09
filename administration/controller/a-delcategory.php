<?php

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
    require_once "../model/post.php";

    $id = $_GET["id"];


    $monObjet = new Post();
    $monObjet->fileDelete($id);

    header('Location: index.php?action=allpost');

    }else{

    header('Location: ../index.php?action=formlogin');
    
    }

?>