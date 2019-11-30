<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <a class="navbar-brand"><img class="logosize" src="assets/images/logo_amicale.png" alt="Logo Amicale" class="img-circle img-responsive"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form class="form-inline">
            <a class="btn btn-outline-success btn btn-primary btn-secondary" href="index.php?action=home"><i class="fas fa-home"></i>Accueil</a>
        </form>
        <div class="dropdown btn-outline-success btn btn-primary">
            <button class="btn btn-secondary dropdown-toggle navbar-expand-lg navbar-light bg-light style='color: yellow;'" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</button>
            <div class="dropdown-menu navbar-expand-lg navbar-light bg-light aria-labelledby="dropdownMenuButton">
                <?php 

                    require_once 'model/category.php';
                    $maCategoryObj = new Category();
                    $mesCategory = $maCategoryObj->findAll();

                    echo"

                    <a class='dropdown-item' href='index.php?action=home'>Toutes les Catégories</a>";

                    foreach($mesCategory as $maCategory){
                    echo"

                    <a class='dropdown-item' href='index.php?action=home&idcategory=".$maCategory->getId()."'>".$maCategory->getName()."</a>";

                }

                ?>

            </div>
            <form class="choco btn-outline-success btn btn-primary">
                <a href="index.php?action=login">Connexion</i></a>
            </form>

        </div>           
        

</nav>