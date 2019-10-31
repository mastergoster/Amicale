<br>
    <div class="test" style='text-align: center'><a href='index.php?action=formaddcategory' class="btn btn-secondary">Ajouter une Catégorie / Article</a></div>
<br>

<table class="table table-bordered table-striped col-md-4 col-md-offset-4">
    <thead>
        <tr>
            <th>Nom des catégories</th>
            <th>Ajouter un Article</th>
            <th>Modification</th>
            <th>Suppression</th>

        </tr>
    </thead>
    <tbody>
    <?php

        foreach($mesCategory as $category)
        {
        echo '<tr><td><i class="'.$category->getCodef()->getCodef().'"></i> '.$category->getName().'</td>';
        echo '<td><div class="categorymanage"><a href="index.php?action=allpost&idcateg='.$category->getId().'" title="Ajouter un Article"><i class="far fa-edit"></i></a></div></td>';
        echo '<td><div class="categorymanage"><a href="index.php?action=formeditcategory&id='.$category->getId().'" title="Modifier une Catégorie"><i class="far fa-edit"></i></a></div></td>';
        echo '<td><div class="categorymanage"><a href="index.php?action=delcategory&id='.$category->getId().'" title="Supprimer une Catégorie"><i class="far fa-trash-alt"></i></a></div></td></tr>';
        }
    ?>
    </tbody>
</table>
<br>