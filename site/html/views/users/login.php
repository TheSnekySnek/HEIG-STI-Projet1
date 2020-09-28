<!doctype html>
<html>
<?php include "../head.php";?>
<body>
    <div class="container">
        <h1 class="mt-2">Login</h1>

        <form action="/controllers/users/login_user.php" method="post">
            <div class="form-group">
                <label for="username">Utilisateur</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Se Connecter</button>
        </form>
        
    </div>
<?php include "../scripts.php";?>
</body>
</html>
