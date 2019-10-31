    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href=""><img src="assets/images/logo amicale sans fond Modif.png" alt="Logo Amicale" class="img-circle img-responsive"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <form class="form-inline">
                <button class="btn btn-outline-success btn btn-primary" type="button"><a href="index.php?action=home">Accueil</a></button>
            </form>
            <form class="form-inline">
                <button class="btn btn-outline-success btn btn-primary" type="button"><a href="index.php?action=allalerte">Présentation des produits</a></button>
            </form>
            <form class="form-inline">
                <button class="btn btn-outline-success btn btn-primary" type="button"><a href="index.php?action=allcategory">Contact</a></button>
            </form>


            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catégorie
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php 

                    $maCategoryObj = new Category();
                    $mesCategory = $maCategoryObj->findAll();

                    foreach($mesCategory as $maCategory){
                    echo"

                    <a class='dropdown-item' href='index.php?action=home&idcategory=".$maCategory->getId()."'>".$maCategory->getName()."</a>";

                    }
                    ?>
                </div>
            </div>
            
            
            <form class="choco">
            <a href="index.php?action=login"><i class="fas fa-sign-out-alt"></i></a>
        </form> 

    </nav>
