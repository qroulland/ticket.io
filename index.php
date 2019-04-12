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

include('template/header.php') ?>


<div class="background-rotate"></div>

<?php if($error === true){ ?>
    <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto" role="alert">
        <strong>Erreur !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } include('template/login.php'); ?>

</body>

</html>