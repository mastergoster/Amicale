<nav class="navbar navbar-expand" >
    <a href="index.php" class="navbar-brand"><img class="logosize" src="assets/images/Webp.net-resizeimage.png" alt="Logo Amicale" class="img-circle img-responsive"></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></i></span>
    </button>
        <div class="container-nav">
        <!--<form class="form-inline nav-bar mr-auto">
            <a class="test1 nav-item btn btn-outline-success btn btn-primary btn-secondary" href="index.php?action=home"><i class="fas fa-home"></i></a>
        </form>-->

            <div class="form-inline dropdown">
                <div class="collapse navbar-collapse" id="navbarNav">
                        <button class="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories <i class="fas fa-caret-down"></i></button>
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
                    <form class="office_connexion">
                        <a href="index.php?action=login">Connexion</i></a>
                    </form>
                </div>
            </div>
        </div>
</nav>