<?php
// Check if the user is logged in
if( !isset($_SESSION['user']) ){
    header('Location: /views/users/login.php');
    die();
}
