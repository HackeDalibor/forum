<?php

    $topics = $result["data"]['topics'];

    
    if (!empty($topics)) {
        
        $user = $topics->current()->getUser();


?>


    <h1><?= $user->getNickname(); ?></h1>

    <p>A rejoint le : <?= $user->getCreationDate() ?></p>
    <h2>Topics :</h2>

    <table>
        <thead>
            <tr>
                <th>Topics : </th>
                <th>Date du post : </th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($topics as $topic) { ?>

                <tr>
                    <td><a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a></td>
                    <td><?= $topic->getDateTopic() ?></td>
                    <td><a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>">Delete</a></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    
<?php

    } else {

    $user = $result['data']['user'];
?>

    <h1><?= $user->getNickname(); ?></h1>

    <p>A rejoint le : <?= $user->getCreationDate(); ?></p>


    <h2>Pas de topics pour le moment</h2>

<?php } ?>
