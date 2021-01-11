<?php
include "../../../databases/db_connection.php";

session_start();
include "../../scripts/check_authentication.php";

// Check if the new password was sent
if( !isset($_POST['password'])){
    header('Location: views/users/change_password.php');
    die();
}

// Generate the password hash
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);

// Update the password associated with user
$sql = $file_db->prepare("UPDATE users SET `password` = ? WHERE `username` = ?");
$sql->execute([$hash, $_SESSION['user']]);

header('Location: /views/users/change_password.php');
die();

?>
