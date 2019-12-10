<?php
require __DIR__ . '/altorouter.class.php';
require __DIR__ . '/RouterPlus.class.php';
if (file_exists($_SERVER['SCRIPT_FILENAME']) && pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_EXTENSION) !== 'php') {
    return;
}
$router = new RouterPlus(true);
$router
    ->map('GET', '/[i:p]?', 'home', 'home')
    ->map('GET', '/categories/[*:slug]-[i:idcategory]', 'home', 'categories')
    ->map('GET|POST', '/connexion', 'formlogin', 'login')
    ->addOldRoute("index.php?action=formlogin", "/connexion")
    ->addOldRoute("index.php?action=home", "/")
    ->addOldRoute("index.php?action=home&p=" . $_GET["p"], "/" . $_GET["p"])
    ->addOldRoute("index.php", "/")
    ->addOldRoute("index.php?action=home&idcategory=" . $_GET["idcategory"],  "/categories/slug-" . $_GET["idcategory"])
    ->redirect();
$match = $router->match();

session_start();
// *** traitement de l'action ***
//si contracté $action = (isset($_GET['action']) && !empty($_GET['action']))?(strtolower($_GET['action'])):('home');
if ((isset($_GET['action']) && !empty($_GET['action'])) || $match['target']) {
    $action = $match['target'] ?: strtolower($_GET['action']);
} else {
    $action = 'home';
}

$scriptAction = 'controller/a-' . $action . '.php';

if (file_exists($scriptAction)) {
    $verifpost = ['add', "del", "edi"];
    if (in_array(substr($action, 0, 3), $verifpost)) {

        if (!empty($_POST)) {
            include $scriptAction;
        } else {
            if (substr($action, 0, 4) == "edit") {
                header('Location: index.php?action=all' . substr($action, 4));
            } else {
                header('Location: index.php?action=all' . substr($action, 3));
            }
        }
    } else {
        include $scriptAction;
    }


    // Ajout du header
    include "view/header.php";

    // *** génération de la vue ***
    $scriptVue = 'view/v-' . $view . '.php';
    include $scriptVue;

    // Ajout du footer
    include 'view/footer.php';
} else {
    header('Location: error.php');
}
