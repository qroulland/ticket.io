<?php 

session_start();

include('Inc/function/user.php');

if(!isset($_SESSION['login']) || $_SESSION['loginRole'] != 3) {
    header('location: /ticket.io');
}

if (!empty($_GET['do'])) {
    $parse = explode("/", $_GET['do']);
	if ($parse[0] == "removeUser") {
        removeUser($parse[1]);
    } elseif ($_GET['do'] == "createUser") {
        if (empty($_POST['user_nom']) || empty($_POST['user_prenom'] || empty($_POST['user_login']) || 
        empty($_POST['user_password']) || empty($_POST['user_role']))) {
            return false;
        } else {
            createUser();
        }
    }
}

include('Template/header.php');

include('Template/navbar.php');

include('Template/users.php');

include('Template/modalUser.php');

include('Template/footer.php'); 

?>