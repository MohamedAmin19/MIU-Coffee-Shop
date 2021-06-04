<?php
include 'classes.php'; 


session_start();
$_SESSION['User']->signout();
?>