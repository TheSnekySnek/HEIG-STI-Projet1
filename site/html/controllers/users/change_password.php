<?php include "../../../databases/db_connection.php"; ?>

<?php
session_start();

// Check if the user is logged in
if( !isset($_SESSION['user']) ){
    header('Location: views/users/login.php');
    die();
}

// Check if the new password was sent
if( !isset($_POST['password'])){
    header('Location: views/users/change_password.php');
    die();
}

// Update the password associated with user
$sql = $file_db->prepare("UPDATE users SET `password` = ? WHERE `username` = ?");
$sql->execute([$_POST['password'], $_SESSION['user']]);

header('Location: /views/users/change_password.php');
die();

?>