<?php
// Test temporaire de l'idcateg
// $id = 190; 

// Récupère l'id post

$id = $_GET['id'];

require_once '../model/post.php';

$monModal = new Post();
$monModal->retrieve($id);
//var_dump($monModal);
header("Content-Type: application/json");
echo json_encode(
    [
        "title" => $monModal->getTitle(),
        "imgsrc" => "/assets/uploads/picture/" . $monModal->getPicture(),
        "content" => $monModal->getContent()
    ]
);
