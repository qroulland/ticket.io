<?php 

session_start();

if(!isset($_SESSION['login'])) {
    header('location: /ticket.io');
}

include('template/header.php');

include('template/navbar.php');

include('template/profil.php');

include('template/footer.php'); 

?>