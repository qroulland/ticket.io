<?php 

$error = false;

if ( isset($_POST['login']) || isset($_POST['password']) ) {
    $error = true;
}

?>

<html>
<head>
    <?php include('injection.php');?>
</head>

<body>
    <div class="background-rotate"></div>

    <?php if($error === true){ ?>
        <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto" role="alert">
            <strong>Erreur !</strong> Veuillez renseignez tous les champs
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    
    <div class="text-center d-flex h-100">
        <form action="" method="POST"class="form w-25 m-auto align-item-center">
            <img class="mb-4" src="assets/img/Ticket.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Connexion à Ticket.IO</h1>
            <div class="form-group">
                <input name="login" type="text" id="inputEmail" class="form-control" placeholder="Admin" autofocus>
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