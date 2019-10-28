<br>
<div class="test" style='text-align: center'><a href='index.php?action=formaddcategory' class="btn btn-secondary">Ajouter une catégorie</a></div>
<br>

<table class="table table-bordered table-striped col-md-4 col-md-offset-4">
<thead>
    <tr>
        <th colspan=2>Nom des catégories :</th>
    </tr>
</thead>
<tbody>
<?php

    foreach($mesCategory as $category)
    {
    echo '<tr><td><i class="'.$category->getCodef()->getCodef().'"></i> '.$category->getName().'</td>';
    echo '<td><div class="categorymanage"><a href="index.php?action=allpost&idcateg='.$category->getId().'" title="Test"><i class="far fa-edit"></i></a>&nbsp;&nbsp;<a href="index.php?action=formeditcategory&id='.$category->getId().'"><i class="far fa-edit"></i></a>&nbsp;&nbsp;<a href="index.php?action=delcategory&id='.$category->getId().'"><i class="far fa-trash-alt"></i></a></div></td></tr>';
    }
?>
</tbody>
</table>
