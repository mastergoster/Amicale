<?php
    if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
    {
    require_once "../model/category.php";
    $id = $_GET["id"];
    $monObjet = new Category();
    $monObjet->delete($id);

        header('Location: index.php?action=allcategory');
    }else{
        header('Location: ../index.php?action=formlogin');    
    }
?>