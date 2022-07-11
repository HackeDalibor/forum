<?php

    $users = $result["data"]['users'];
    
    if(!empty($users)) {
?>

<h1>liste users</h1>

<?php
    foreach($users as $user ){
?>

    <a href="index.php?ctrl=user&action=detailUser&id=<?=$user->getId()?>"><?=$user->getNickname()?></a>

<?php }

    } else {
?>

    <h3>Il n'y a pas d'utilisateurs</h3>

<?php }