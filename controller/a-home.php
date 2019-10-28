<?php

require_once 'model/post.php';
require_once 'model/alerte.php';


//$mesPosts = Post::findAll();

        $monAlerte = new Alerte();
        $monMessage = $monAlerte->showAlert();

        $page = intval(isset($_GET['p'])?($_GET['p']):(0));

        $limit = 2;
        $offsetDebut = ($page-0) * $limit;
        $offsetFin = ($page) * $limit;

        $monPost = new Post();
        $mesPosts = $monPost->findAllPaginate($limit, $offsetDebut);
        $mesPins = Post::findAllByPin();
        $nbPost = $monPost->getNbPost();
        $nbPage = ceil($nbPost / $limit);
        //var_dump($page);
//var_dump($nbPage);
        if($page >= $nbPage){
                $page= $nbPage-1;

                header('Location: index.php?action=home&p=0');
        }elseif($page < 0)
        {
                header('Location: index.php?action=home');
        }

$view = 'home';

?>