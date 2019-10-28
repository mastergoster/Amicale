<?php 
    foreach($mesPins as $post){
        echo "
<div class='bs-example'>
    <div id='myCarousel' class='carousel slide' data-interval='6500' data-ride='carousel'>
        <!-- Carousel indicators -->
        <ol class='carousel-indicators'>
            <li data-target='#myCarousel' data-slide-to='0' class='active'></li>

        </ol>   
        <!-- Carousel items -->
        <div class='carousel-inner'>
            <div class='active item carousel-fade'>
                <h2>Slide 1</h2>
                <div class='carousel-caption'>
                    <h3>''</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class='item carousel-fade'>
            <h2>Slide 1</h2>
            <div class='carousel-caption'>
                <h3>''</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
            
        </div>
        <!-- Carousel nav -->
        <a class='carousel-control left' href='#myCarousel' data-slide='prev'>
            <span class='glyphicon glyphicon-chevron-left'></span>
        </a>
        <a class='carousel-control right' href='#myCarousel' data-slide='next'>
            <span class='glyphicon glyphicon-chevron-right'></span>
        </a>
    </div>
</div>
";
    }
?>
</ul>

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

        <div class='card' style='width:400px'>
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
        <br>
        ";
        ++$counter;
    }
    
echo "</div>";


      // Affiche le nombre de pagination (4)
    $start = max(0, $page-4);
    $end = min($nbPage-1, $page+4);

    $previous = $page -1;
    $next = $page +1;

    echo "<nav aria-label='pagination'>
            <ul class='pagination'>";
            if($start>=0){
    echo "
                <li class='page-item'>
                    <a  href='index.php?action=home&p=$previous' aria-label='Previous'>
                        <span aria-hidden='true'>&laquo;</span>
                        <span class='sr-only'>Previous</span>
                    </a>
                </li>";
            }

                $i=$start;
                
                while($i <= $end){
                    echo "
                    <li class='page-item'>
                        <a class='page-link' href='index.php?action=home&p=".$i."'>".($i+1)."</a>
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