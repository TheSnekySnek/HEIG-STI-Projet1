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
        <h1 class="mt-2">Ajout Utilisateur</h1>
        <form action="/controllers/users/store_user.php" method="post">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin">
                <label class="form-check-label" for="is_admin">Admin</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                <label class="form-check-label" for="is_active">Actif</label>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
<?php include "../scripts.php";?>
</body>
</html>
