
<html>
<head>
    <?php include('include.php');?>
</head>

<body>
<?php
if(!empty($_GET['do'])) {
    if ($_GET['do'] == "connect") {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            echo 'Identifiants incorrects';
        } else {
            $q = $bdd->prepare('SELECT * FROM utilisateur WHERE util_login = :login AND util_password = :password');
            $q->execute(array('login' => $_POST['login'], 'password' => $_POST['password']));

            $result = $q->fetchAll();
            
            if (count($result) == 0) {
                echo "erreur";
            } else {
                echo "réussi";
            }
        }      
    }
}

?>
    <div class="background-rotate"></div>
    <div class="text-center d-flex h-100">
        <form class="form w-25 m-auto align-item-center" action="?do=connect" method="post">
            <img class="mb-4" src="assets/img/Ticket.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Connexion à Ticket.IO</h1>
            <div class="form-group">
                <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Adresse e-mail" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="btn btn-dark btn-lg">Connexion</button>
            </div>
        </form>
    </div>
</body>
</html>