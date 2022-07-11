<?php

    $categories = $result["data"]["categories"];

    if (!empty($categories)) {

?>
    <h1>liste catégories</h1>
    
    <table>
        <thead>
            <tr>
                <th><strong>Name : </strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category){ ?>
                <tr>
                    <td><a href="index.php?ctrl=category&action=detailCategory&id=<?= $category->getId() ?>"><?= $category->getNameCategory() ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        
<?php } else { ?>

    <h3>Il n'y a pas encore de catégories !</h3>
    
<?php } ?>

<form action="index.php?ctrl=category&action=addCategory" method="post">

    <input type="text" name="name_category" placeholder="Entrez le nom de la catégorie">
    <button type="submit" name="submit">submit</button>
    
    
</form>