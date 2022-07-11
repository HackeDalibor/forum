<?php

    $topics = $result["data"]["detail"];
    $category = $result['data']['category'];
?>

<h1><?= $category->getNameCategory() ?></h1>
<table>
    <thead>
        <th><strong>Topics : </strong></th>
        <th><strong>Date de création : </strong></th>
        <th><strong>Crées par : </strong></th>
    </thead>
    <tbody>

        <?php foreach($topics as $topic){ ?>

            <tr>
                <td><a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a></td>
                <td><?= $topic->getDateTopic() ?></td>
                <td><a href="index.php?ctrl=user&action=detailUser&id=<?= $topic->getUser()->getId()?>"><?= $topic->getUser()->getNickname() ?></a></td>
            </tr>

        <?php } ?>

    </tbody>
</table>
    
    <!-- <h3>Cette catégorie n'a pas de topics</h3> -->


<form action="index.php?ctrl=category&action=addTopicByCategory&id=<?= $category->getId() ?>" method="post">

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nom topic</label>
        <input type="text" name="title_topic" placeholder="Entrez le titre du topic" class="form-control" id="exampleFormControlInput1" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
        <textarea type="text" name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Entrez votre message" cols="25" rows="5" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-outline-info">submit</button>
    
</form>