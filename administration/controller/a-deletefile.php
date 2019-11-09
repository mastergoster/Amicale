<?php

    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
    require_once "../model/post.php";

    $id = $_GET["id"];

    $monObjet = new post();
    $monObjet->fileDelete($id);

    header('Location: index.php?action=allcategory');

    }else{

    header('Location: ../index.php?action=formlogin');
    
    }

?>