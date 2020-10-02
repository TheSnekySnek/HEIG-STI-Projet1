<?php
// Check if the user is admin
if( $_SESSION['admin'] == 'false' ){
    header('Location: /views/messages/messages.php');
    die();
}
