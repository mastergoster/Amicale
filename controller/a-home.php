<?php

require_once 'model/post.php';
require_once 'model/alerte.php';
require_once 'model/horaire.php';


//$mesPosts = Post::findAll();

$monAlerte = new Alerte();
$monMessage = $monAlerte->showAlert();

$page = (isset($_GET['p']) ? ($_GET['p']) : (0));
$idCategory = (isset($_GET['idcategory']) ? ($_GET['idcategory']) : (0));

$limit = 3;
// si page 1 est que limite = 6 alors offset 6 (6*1)
$offsetDebut = ($page) * $limit;

$monPost = new Post();

if ($idCategory != 0) {
        $mesPosts = $monPost->findAllPaginateByCategory($idCategory, $limit, $offsetDebut);
        $nbPost = $monPost->getNbPostByCategory($idCategory);
} else {
        $mesPosts = $monPost->findAllPaginate($limit, $offsetDebut);
        $nbPost = $monPost->getNbPost();
}

$mesPins = Post::findAllByPin();

$nbPage = ceil($nbPost / $limit);

if ($page >= $nbPage && $nbPage != 0) {
        $page = $nbPage - 1;

        header('Location: index.php?action=home&p=' . $page);
} elseif ($page < 0) {
        header('Location: index.php?action=home');
}

$monHoraire = new Horaire();
$monHoraire->retrieveByHoraire();

$view = 'home';
$idCategory = ($idCategory != 0) ? ("&idcategory=" . $idCategory) : ("");
