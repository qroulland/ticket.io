<nav class="navbar">
    <span class="navbar-brand">
        <img src="assets/img/Ticket.png" width="60">
    </span>

    <div class="d-flex justify-content-center align-items-center right-menu">
        <span class="rounded-circle bg-light icon d-flex justify-content-center align-items-center">
            <i class="fas fa-user"></i>
        </span>

        <div class="dropdown">
            <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['login']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Profil</a>
                <a class="dropdown-item" href="deconnexion.php">Se déconnecter</a>
            </div>
        </div>
    </div>
</nav>