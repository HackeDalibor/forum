<?php 

    if(!empty($_SESSION['user'])) {

?>
<h3> <?php APP\Session::getFlash("success")?></h3>

    <p>Vous êtes connecté(e)</p>

<?php } else { 
    header('location:index.php?ctrl=security&action=registerForm');
}