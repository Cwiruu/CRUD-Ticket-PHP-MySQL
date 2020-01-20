<?php session_start(); ?>

<?php

$_SESSION['userid'] = null;
$_SESSION['firstname'] = null;
$_SESSION['email'] = null;
$_SESSION['USER_TYPE'] = null;

header("Location: ../index.php");

?>
