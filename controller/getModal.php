<?php
    // Test temporaire de l'idcateg
    // $id = 190; 

    // Récupère l'id post

    $id=$_GET['id'];

    require_once '../model/post.php';

    $monModal = new Post();
    $monModal->retrieve($id);
    //var_dump($monModal);
?>

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $monModal->getTitle(); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
        <img class='card-img-top-car' src="assets/uploads/picture/<?= $monModal->getPicture(); ?>" alt='Card image' >
            
        
        <hr>
            <?= $monModal->getContent(); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>
