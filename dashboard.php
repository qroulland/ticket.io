<?php 

session_start();

if(!isset($_SESSION['login'])) {
    header('location: /ticket.io');
}

include('template/header.php');

include('template/navbar.php');

?>

<div class="d-flex">

    <?php 
        include('template/side-bar.php');
        include('template/board.php');
    ?>
    
</div>

<?php include('template/footer.php'); ?>