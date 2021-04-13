<?php 

include('Config/db.php');

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
            include('Inc/function/connexion.php');
        }      
    }
}

include('Template/header.php') ?>


<div class="background-rotate"></div>

<?php if($error === true){ ?>
    <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto" role="alert">
        <strong>Erreur !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } include('Template/login.php'); ?>

</body>

</html>