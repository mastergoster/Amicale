    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:40px" >
        <a class="navbar-brand"><img src="assets/images/logo_amicale.png" alt="Logo Amicale" class="img-circle img-responsive"></a>
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
            </div>           
            
            <form class="choco btn-outline-success btn btn-primary">
                <a href="index.php?action=login"><i class="fas fa-sign-out-alt"></i></a>
            </form> 

    </nav>