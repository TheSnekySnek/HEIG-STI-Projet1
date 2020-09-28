<?php include "../../../databases/db_connection.php"; 
session_start();

// Check if the user is logged in
if( !isset($_SESSION['user']) ){
    header('Location: views/users/login.php');
    die();
}
// Check if the user is admin
if( $_SESSION['admin'] == 'false' ){
    header('Location: views/messages/messages.php');
    die();
}
?>
<!doctype html>
<html>
<?php include "../head.php";?>
<body>
<?php include "../nav.php"; ?>
    <div class="container">
        <h1 class="mt-2">Utilisateurs</h1>
        <a href="./new_user.php" class="btn btn-success my-2">Ajouter un utilisateur</a>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">Utilisateur</th>
                <th scope="col">Admin</th>
                <th scope="col">Actif</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = $file_db->prepare("SELECT * FROM users");
            $sql->execute();
            foreach ($sql->fetchAll() as $user) {
                ?>
                <tr>
                <td><?=$user['username']?></td>
                <td><?=$user['is_admin'] == 'true' ? "Oui" : "Non"?></td>
                <td><?=$user['is_active'] == 'true' ? "Oui" : "Non"?></td>
                <td><a href="./edit_user.php?username=<?=$user['username']?>">Modifier</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php include "../scripts.php";?>
</body>
</html>
