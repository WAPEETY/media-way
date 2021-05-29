<?php
session_start();

if(isset($_SESSION['user_id'], $_SESSION['username'])):
    $_SESSION = array();
    session_destroy();
    $logged=false;
endif;

header("Location: index.php");
?>