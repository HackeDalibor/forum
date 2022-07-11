<?php

    $messages = $result["data"]['detail'];
    $topic = $result["data"]["topic"];
    
?>

<h1><?=$topic->getTitle();?></h1>

<p>Posté par : <a href="index.php?ctrl=user&action=detailUser&id=<?=$topic->getUser()->getId()?>"><?=$topic->getUser()->getNickname()?></a> (le<?=$topic->getDateTopic()?>)</p>


        <?php

            if(isset($messages)) {

                foreach($messages as $message) {
        
        ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                        <h5 class="card-title"><a href="index.php?ctrl=user&action=detailUser&id=<?=$message->getUser()->getId()?>"><?=$message->getUser()->getNickname()?></a></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?=$message->getDateMessage()?></h6>
                        <p class="card-text"><?=$message->getText()?></p>
                        <button>Répondre</button>
                        <a href="index.php?ctrl=forum&action=formModifyMessage&id=<?= $message->getId() ?>">Modify</a>
                        <a href="index.php?ctrl=forum&action=deleteMessage&id=<?= $message->getId() ?>">Delete</a>
                    </div>
                </div>
            </div>
            <br>

           

        <?php
        
                }
            } else {
                echo "Pas de messages pour le moment";
            }

        ?>
<br>
<form action="index.php?ctrl=forum&action=addMessage&id=<?= $topic->getId() ?>" method="POST">
    <div class="form-floating">
        <input type="text" name="text" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
        <label for="floatingTextarea2">Comments</label>
    </div><br>
    <button type="submit" name="submit" class="btn btn-outline-dark">Send</button>
</form>