<?php 

session_start();

include('Inc/function/user.php');

if(!isset($_SESSION['login'])) {
    header('location: /ticket.io');
}



include('Template/header.php');

include('Template/navbar.php');

include('Template/profil.php');

include('Template/footer.php'); 

?>