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
if( !isset($_POST['username']) || !isset($_POST['password']) ){
    header('Location: /views/users/show_users.php');
    die();
}
// Check if we need to update the password
if(empty($_POST['password'])){
    // Update the user
    $sql = $file_db->prepare("UPDATE users SET `is_admin` = ?, `is_active` = ? WHERE `username` = ?");
    $result = $sql->execute([isset($_POST['is_admin']) ? 'true' : 'false', isset($_POST['is_active']) ? 'true' : 'false', $_POST['username']]);
}
else{
    // Update the user
    $sql = $file_db->prepare("UPDATE users SET `password` = ?, `is_admin` = ?, `is_active` = ? WHERE `username` = ?");
    $result = $sql->execute([$_POST['password'], isset($_POST['is_admin']) ? 'true' : 'false', isset($_POST['is_active']) ? 'true' : 'false', $_POST['username']]);
}

// Redirect the user
header('Location: /views/users/show_users.php');
die();

?>