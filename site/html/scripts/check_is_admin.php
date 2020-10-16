<?php
// Check if the user is admin
if( $_SESSION['admin'] == 0 ){
    header('Location: /views/messages/messages.php');
    die();
}
