<html>
<head>
    <?php include('injection.php');?>
</head>

<body>
    <div class="background-rotate"></div>
    <div class="text-center d-flex h-100">
        <form class="form w-25 m-auto align-item-center">
            <img class="mb-4" src="assets/img/Ticket.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Connexion à Ticket.IO</h1>
            <div class="form-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Adresse e-mail" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="btn btn-dark btn-lg">Connexion</button>
            </div>
        </form>
    </div>
</body>
</html>