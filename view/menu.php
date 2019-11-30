<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <a class="navbar-brand"><img class="logosize" src="assets/images/logo_amicale.png" alt="Logo Amicale" class="img-circle img-responsive"></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></i></span>
    </button>
        <div class="test">
        <form class="form-inline nav-bar mr-auto">
            <a class="test1 nav-item btn btn-outline-success btn btn-primary btn-secondary" href="index.php?action=home"><i class="fas fa-home"></i></a>
        </form>

            <div class="form-inline dropdown btn-outline-success btn btn-primary">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <button class="btn btn-secondary dropdown-toggle navbar-expand-lg navbar-light bg-light style='color: yellow;'" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</button>
                    <div class="dropdown-menu navbar-expand-lg navbar-light bg-light aria-labelledby=dropdownMenuButton">
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
                    <form class="office_connexion btn-outline-success btn btn-primary">
                        <a href="index.php?action=login">Connexion</i></a>
                    </form>
                </div>
            </div>
        </div>
</nav>