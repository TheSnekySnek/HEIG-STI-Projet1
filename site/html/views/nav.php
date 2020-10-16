<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/views/messages/messages.php">My super message App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/views/messages/messages.php">Mes messages</a>
            </li>
            <?php
            session_start();
                if($_SESSION['admin']){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/users/show_users.php">Utilisateurs </a>
                    </li>
                    <?php
                }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="/views/users/change_password.php">Changer de mot de passe </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/users/logout_user.php">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>
