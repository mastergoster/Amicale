<?php echo "
    <div id='myCarousel' class='carousel slide' data-ride='carousel'>
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

                    <img class='card-img-top' src='../assets/uploads/picture/".$post->getPicture()."' alt='Card image' style='width:50%'>
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

?>

<div class='holder'>
<ul id='ticker01'>
<?php 
    foreach($mesPins as $post){
        echo "

            <li><span>20/10/2018</span><a href='".$post->getTitle()."'> ".$post->getTitle()."</a></li>

        ";
    }
?>
</ul>

<?php 
    $counter=0;
    
    foreach($mesPosts as $post)
    {
        echo "

        <div class='card col-sm-6' style='width: 42%; height: 35em; margin: 25px;'>
        <img class='card-img-top' src='../assets/uploads/picture/".$post->getPicture()."' alt='Card image' style='width:100%'>
        <div class='card-body'>
            <h4 class='card-title'>".$post->getTitle()."</h4>
            <div id='preview".$counter."'>
            ".substr(strip_tags($post->getContent()), 0, 130). "<div onclick='showhide(".$counter.")'>...  Lire la suite</div>
            </div>
            <div id='scrollcontent".$counter."' style='display:none'>
            ".$post->getContent()."
            </div>
            <button id='buttonarticle".$counter."' style='display:none' onclick='showhide(".$counter.")'>En savoir plus</button>
            <p><a href='../assets/uploads/file/".$post->getFile()."'>".$post->getFile()."</a></p>
            <p class='card-text'><small class='text-muted'>".$post->getDatePost()."</small></p>
        </div>
        </div>

        ";
        ++$counter;
    }
    
echo "</div>";


    // Affiche le nombre de pagination (4)
    $start = max(0, $page);
    $end = min($nbPage-1, $page+3);
    //var_dump($page);
    //var_dump($start);die();
    $previous = $page -1;
    $next = $page +1;

    echo "<nav aria-label='pagination'>
            <ul class='pagination'>";
            if($start>0){
    echo "
                <li class='page-item'>
                    <a  href='index.php?action=home&p=$previous' aria-label='Previous'>
                        <span aria-hidden='true'>&laquo;</span>
                        <span class='sr-only'>Previous</span>
                    </a>
                </li>";
            }

                $i=$start;
                
                while($i-2 < $end-1){
                    echo "
                    <li class='page-item'>
                        <a class='page-link' href='index.php?action=home&p=".($i+1)."'>".($i+1)."</a>
                    </li>";
                ++$i;
                }
                if($page<=$nbPage-4){
    echo "
                <li class='page-item'>
                    <a href='index.php?action=home&p=$next' aria-label='Next'>
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

    var preview='#preview'+counter;
    var scrollcontent='#scrollcontent'+counter;
    var buttonarticle='#buttonarticle'+counter;

    if ($(preview).is(":visible"))
    {
        $(preview).hide();
        $(buttonarticle).show();
        $(scrollcontent).show();
    }else{
        $(preview).show();
        $(buttonarticle).hide();
        $(scrollcontent).hide();
    }
}
</script>