<?php include "../../../databases/db_connection.php"; ?>

<?php
session_start();

// Check if the user is logged in
if( !isset($_SESSION['user']) ){
    header('Location: /views/users/login.php');
    die();
}
// Check if the user is admin
if( $_SESSION['admin'] == 'false' ){
    header('Location: /views/messages/messages.php');
    die();
}
// Make sure all paramaters have been passed
if( !isset($_POST['username']) ){
    header('Location: /views/users/show_users.php');
    die();
}
// Update the user
$sql = $file_db->prepare("UPDATE users SET `is_active` = 'false' WHERE `username` = ?");
$result = $sql->execute([$_POST['username']]);

// Redirect the user
header('Location: /views/users/show_users.php');
die();

?>