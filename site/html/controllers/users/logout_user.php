<?php
// Destroy session and redirect to login
session_start();
$_SESSION = [];
session_destroy();

header('Location: /views/users/login.php');
die();
?>
