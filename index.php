<?php 

include('config/db.php');

$error = false;

session_start();

if(isset($_SESSION['login'])) {
    header('location: dashboard.php');
}

if(!empty($_GET['do'])) {
    if ($_GET['do'] == "connect") {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            $error = true;
        } else {
            $q = $bdd->prepare('SELECT * FROM utilisateur WHERE util_login = :login AND util_password = :password');
            $q->execute(array('login' => $_POST['login'], 'password' => $_POST['password']));

            $result = $q->fetchAll();
            
            if (count($result) == 0) {
                $error = true;
            } else {
                session_start();
                $_SESSION['login']= $_POST['login'];
                header('Location: dashboard.php'); 
            }
        }      
    }
}

?>

<html>
<head>
    <?php include('include/includeHeader.php');?>
</head>

<body>
    <div class="background-rotate"></div>

    <?php if($error === true){ ?>
        <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto" role="alert">
            <strong>Erreur !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    
    <div class="text-center d-flex h-100">
        <form action="?do=connect" method="POST"class="form w-25 m-auto align-item-center">
            <img class="mb-4" src="assets/img/Ticket.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Connexion à Ticket.IO</h1>
            <div class="form-group">
                <input name="login" type="text" id="inputEmail" class="form-control" placeholder="Login" autofocus>
            </div>
            <div class="form-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe">
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="btn btn-dark btn-lg">Connexion</button>
            </div>
        </form>
    </div>

</body>
</html>