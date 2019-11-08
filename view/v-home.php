<?php echo "
    <div class='carousel slide col-md-8' id='myCarousel' class='carousel slide' data-ride='carousel'>
        <!-- Indicators -->
            <ol class='carousel-indicators'>";
                foreach($mesPins as $key => $post){
                    if($mesPins[0] == $post)
                    {
                        echo "<li data-target='#myCarousel' data-slide-to='$key' class='active'></li>";
                    }else
                    {
                        echo "<li data-target='#myCarousel' data-slide-to='$key'></li>";
                    }  
                }
                        echo "
                            </ol>";
                        echo "
                <div class='carousel-inner'>";
                        foreach($mesPins as $post){
                
                                if($mesPins[0] == $post)
                            {
                                echo "<div class='item active carousel-item'>";
                            }else 
                            {
                                echo "<div class='item carousel-item'>";
                            }
                                echo "

                            <img class='card-img-top' src='../assets/uploads/picture/".$post->getPicture()."' alt='Card image' >
                </div>";
                    
                }
    echo " 
    </div>";

echo "

    <!-- Left and right controls -->
    <a class='left carousel-control' href='#myCarousel' data-slide='prev'>
        <span class='glyphicon glyphicon-chevron-left'></span>
        <span class='sr-only'>Previous</span>
    </a>
    <a class='right carousel-control' href='#myCarousel' data-slide='next'>
        <span class='glyphicon glyphicon-chevron-right'></span>
        <span class='sr-only'>Next</span>
    </a>
    
</div>";
foreach($mesHoraires as $horaire){
    echo "
    <div class='card card-hor'>Horaire d'ouverture de l'amicale : <br> 18 Avenue du 8 Mai 1945  <br> 03100 Montluçon     <p>".$horaire->getContent()."</p></div>

    ";
}
?>

<?php 
    // Affichage du bandeau des alertes
    echo " 
    <div id='cadrpg'> 
    <br>
        <div class='' id='newshr'>
            <a style='width:100%' id='defile' >
            .$monMessage.</a>
        </div>
    </div>

    ";

    // Affichage des posts

    // permet de mettre un id diffèrent pour chaque article
    $counter=0;
    
    foreach($mesPosts as $post)
    {
        echo "
        
        <div class='card col-md-8' style='width: 28%; margin: 25px;'>
            <img class='img_article' src='../assets/uploads/picture/".$post->getPicture()."' alt='Card image' style='width:100%'>
            <div class='card-body'>
                <h4 class='card-title '>".$post->getTitle()."</h4>
                <div id='preview".$counter."'>
                    ".substr(strip_tags($post->getContent()), 0, 130). "<div onclick='showhide(".$counter.")'>  <div class='read_next'>...  Lire la suite</div></div>
                </div>
                <div class='' id='scrollcontent".$counter."' style='display:none'>
                    ".$post->getContent()."

                    ".substr(strip_tags($post->getContent()), 0, 130). "<div onclick='showhide(".$counter.")'>  <div class='read_next'>...  Fermer l'article</div></div>
                </div>
                <p><a href='../assets/uploads/file/".$post->getFile()."'>".$post->getFile()."</a></p>
                <p class='card-text'><small class='text-muted'>".date('d/m/Y', strtotime($post->getDatePost()))."</small></p>

            </div>
        </div>

        ";
        ++$counter;
    }

echo "</div>";

    // Affiche le nombre de pagination (6)

    //var_dump($page);
    //var_dump($start);die();
    $previous = $page -1;
    $next = $page +1;

    echo "<nav aria-label='pagination'>
            <ul class='pagination'>";
            if($page > 2){
    echo "
                <li class='page-item'>
                    <a  href='index.php?action=home&p=$previous"; echo ($idCategory != 0)?("&idcategory=".$idCategory):(""); echo"' aria-label='Previous'>
                        <span aria-hidden='true'>&laquo;</span>
                        <span class='sr-only'>Previous</span>
                    </a>
                </li>";
            }

                $start = ($page-2 >= 0)?($page-2):(0);
                $end = ($page+3 <= $nbPage)?($page+3):($nbPage);
                $i=0;
                while($i < $nbPage){
                    if($i >= $start && $i < $end){
                        echo "
                        <li class='page-item'>
                            <a class='page-link' href='index.php?action=home&p=".$i; echo ($idCategory != 0)?("&idcategory=".$idCategory):(""); echo"'>".($i+1)."</a>
                        </li>";
                    }   
                    ++$i;
                }
                if($page<=$nbPage-4){
    echo "
                <li class='page-item'>
                    <a href='index.php?action=home&p=$next"; echo ($idCategory != 0)?("&idcategory=".$idCategory):(""); echo"' aria-label='Next'>
                        <span aria-hidden='true'>&raquo;</span>
                        <span class='sr-only'>Next</span>
                    </a>
                </li>";
                }
    echo "
            </ul>
            </nav>";
?>

<script type="text/javascript">

// afficher/cacher comment

function showhide(counter) 
{
    // crée la variable #
    var preview='#preview'+counter;
    var scrollcontent='#scrollcontent'+counter;
    var buttonarticle='#buttonarticle'+counter;

    // vérifie s'il est visible
    if ($(preview).is(":visible"))
    {  
        // quand il est visible
        $(preview).hide(); // je cache preview 
        $(buttonarticle).show(); // j'affiche le button article
        $(scrollcontent).show(); // j'affiche le scrollcontent
    }else{
        $(preview).show();
        $(buttonarticle).hide();
        $(scrollcontent).hide();
    }
}
</script>