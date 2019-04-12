<?php 

session_start();

include('config/db.php');

if(!isset($_SESSION['login'])) {
    header('location: /ticket.io');
}

function fetchProjects() {
	include('config/db.php');
    $q = $bdd->query('SELECT * FROM projets');
    return $projects = $q->fetchAll();
}

function fetchTypes() {
	include('config/db.php');
    $q = $bdd->query('SELECT * FROM type_ticket');
    return $types = $q->fetchAll();
}

function fetchUrgencies() {
	include('config/db.php');
    $q = $bdd->query('SELECT * FROM urgence');
    return $urgencies = $q->fetchAll();
}

$projects = fetchProjects();
$types = fetchTypes();
$urgencies = fetchUrgencies();

/* if (!empty($_GET['do'])) {
	if ($_GET['do'] == "update") {
		filter();
	}
*/ 


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