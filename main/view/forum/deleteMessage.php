<?php

    $deleteMessage = $result["data"]['delete'];

    header("Location:index.php?ctrl=forum&action=listTopics");