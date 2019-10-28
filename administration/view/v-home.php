<div class="card mb-3"></div>Bienvenue <?= $_SESSION['amicale']['auth']['login'] ?>, vous êtes bien connecté.</div>

<?php 
    echo " 

      <marquee>.$monMessage.</marquee>
      ";
?>

<?php 
      foreach($mesPins as $post)
      {
        echo "<div class='card-title'>".$post->getTitle()."</div>";
      }
?>


    <?php 
    $counter=0;

    foreach($mesPosts as $post)
      {
          echo "
          <div class='card mb-3' style='max-width: 540px;'>
            <div class='row no-gutters'>
              <div class='col-md-10'>
                <img src='../assets/uploads/picture/".$post->getPicture()."'>
              </div>
              <div class='col-md-8'>
                <div class='card-body'>
                  <h5 class='card-title'>".$post->getTitle()."</h5>

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
            </div>
          </div>";
          ++$counter;
      }
      
      $i=0;
      while($i < $nbPage){
        echo "<a href='index.php?action=home&p=".($i+1)."'>".($i+1)."</a>";
        ++$i;
      }
    ?>


<script type="text/javascript">
var defile;// l'element a deplacer 
var psinit = 580; // position horizontale de depart 
var pscrnt = psinit;       
function texteDefile() { 
  if (!defile) defile = document.getElementById('defile'); 
  if (defile) { 
      if(pscrnt < ( - defile.offsetWidth) ){ 
      pscrnt = psinit; 
                } else { 
         pscrnt+= -1; // pixel par deplacement 
      } 
      defile.style.left = pscrnt+"px"; 
  } 
} 
setInterval("texteDefile()",20); // delai de deplacement 


// afficher/cacher comment

function showhide(counter) {

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
<style type="text/css">
#boxe_defil { position:relative; width:580px; height:20px; overflow:hidden; } 
#defile { position:absolute; margin-top:1px; background-color:transparent; }
</style>