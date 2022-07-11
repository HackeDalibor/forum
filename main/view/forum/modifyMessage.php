<?php
    $message = $result['data']['message']
?>

<form action="index.php?ctrl=forum&action=modifyMessage&id=<?= $message->getId() ?>" method="post">
    <textarea name="text" cols="30" rows="10"><?= $message->getText() ?></textarea>
    <button type="submit" name="submit">Saisir</button>
</form>