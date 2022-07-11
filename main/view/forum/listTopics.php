<?php

use App\Session;

    $topics = $result["data"]['topics'];
    $categories = $result["data"]['categories'];

    
    
    if(session_status() === PHP_SESSION_NONE)
    {
        // var_dump(session_status()); die;
        echo $_SESSION["user"]->getNickname();
    }

    if(!empty($topics)) {
        // La différence entre le isset et empty : https://fr.acervolima.com/difference-entre-les-fonctions-isset-et-empty/
?>

<h1>liste topics</h1>



<h3> <?= APP\Session::getFlash("success")?></h3>
   


<table>
    <thead>
        <tr>
            <th><strong>Topic : </strong></th>
            <th><strong>Ajouté le : </strong></th>
            <th><strong>Par : </strong></th>
            <th><strong>Catégorie : </strong></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($topics as $topic ){ ?>

            <tr>
                
                <td><a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId()?>"><?=$topic->getTitle()?></a></td>
                <td><?=$topic->getDateTopic()?></td>
                <td><a href="index.php?ctrl=user&action=detailUser&id=<?= $topic->getUser()->getId()?>"><?=$topic->getUser()->getNickname()?></a></td>
                <td><a href="index.php?ctrl=category&action=detailCategory&id=<?= $topic->getCategory()->getId()?>"><?= $topic->getCategory()->getNameCategory()?></a></td>
            
            </tr>

        <?php } ?>
    </tbody>
</table><br>
<?php } else { ?>

    <h3>Il n'y a pas de topics !</h3>

<?php }

if(App\Session::getUser()) {
?>

<form action="index.php?ctrl=forum&action=addTopic" method="post">

    <input type="text" name="title_topic" placeholder="Entrez le titre du topic">
    <select name="choisir">
        <option selected>catégories</option>
        <?php foreach($categories as $category) { ?>
            <option value="<?= $category->getId() ?>"><?= $category->getNameCategory() ?></option>
        <?php } ?>
    </select>
    <button type="submit" name="submit">submit</button>
    
    
</form>

<?php }