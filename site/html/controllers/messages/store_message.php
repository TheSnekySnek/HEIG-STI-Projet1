<?php
session_start();
include "../../../databases/db_connection.php";
include "../../scripts/check_authentication.php";

$_SESSION['errors'] = [];
$_SESSION['old_post'] = $_POST;
$auth_user = $_SESSION['user'];
if (empty($_POST['sendTo']))
    $_SESSION['errors'][] = 'sendTo';
else {
    $query = $file_db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $query->execute([$_POST['sendTo']]);
    // if user not found
    if ($query->fetchColumn() != 1) $_SESSION['errors'][] = 'sendTo';
}
if (empty($_POST['subject'])) $_SESSION['errors'][] = 'subject';
if (empty($_POST['content'])) $_SESSION['errors'][] = 'content';

if (sizeof($_SESSION['errors']) > 0) {
    header('Location: /views/messages/new_message.php');
    exit;
} else {
    $_SESSION['errors'] = null;
    try {
        $query = $file_db->prepare("INSERT INTO messages (subject, content, `time`, `from`, `to`) VALUES (?, ?, ?, ?, ?)");
        $query->execute([
            $_POST['subject'],
            $_POST['content'],
            time(),
            $auth_user,
            $_POST['sendTo']
        ]);
        header("Location: /views/messages/messages.php");
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
