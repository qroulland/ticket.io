<?php 

session_start();

$tickets= [];
$col = ["Todo","In progress", "Done", "Close"];

require_once('config/db.php');
require_once('Inc/function/project.php');
require_once('Inc/function/ticket.php');
require_once('Inc/function/type.php');
require_once('Inc/function/urgency.php');
require_once('Inc/function/user.php');

if(!isset($_SESSION['login'])) {
    header('location: /ticket.io');
}

if (!empty($_GET['do'])) {
    $parse = explode("/", $_GET['do']);
	if ($_GET['do'] == "createTicket") {
        if (empty($_POST['ticket_title']) || empty($_POST['ticket_description'] || empty($_POST['ticket_project']) || 
        empty($_POST['ticket_type']) || empty($_POST['ticket_urgency']))) {
            return false;
        } else {
            createTicket();
        }
    } elseif ($_GET['do'] == "createProject") {
        if (empty($_POST['project_name'])) {
            var_dump('empty');
        } else {
            createProject();
        }
    } elseif ($parse[0] == "start_intervention"){
        start_intervention($parse[1]);
    } elseif ($parse[0] == "end_intervention"){
        end_intervention($parse[1]);
    } elseif ($parse[0] == "close_ticket"){
        close_ticket($parse[1]);
    } elseif ($parse[0] == "return_to_SI"){
        return_to_SI($parse[1]);
    } elseif ($parse[0] == "return_to_TD"){
        return_to_TD($parse[1]);
    }
}

include('template/header.php');

include('template/navbar.php');

?>

<div class="d-flex" style="margin-top: 80px">

    <?php 
        include('template/side-bar.php');
        include('template/board.php');
    ?>
    
</div>

<?php include('template/footer.php'); ?>
