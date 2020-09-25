<?php
// Destroy session and redirect to login
session_destroy();
header('Location: /views/users/login.php');
?>