<?php
include "../../../databases/db_connection.php";

session_start();
include "../../scripts/check_authentication.php";
$auth_user = $_SESSION['user'];
if (isset($_GET['id'])) {
    // check if the message exist and belongs to the auth user
    $query = $file_db->prepare("SELECT count(*) FROM messages WHERE id = ? AND `to` = ?");
    $query->execute([$_GET['id'], $auth_user]);

    if ($query->fetchColumn() == 1) {
        // delete message
        $query = $file_db->prepare("DELETE FROM messages WHERE id = ?");
        $query->execute([$_GET['id']]);
    }

}
header('Location: /views/messages/messages.php');
exit;
