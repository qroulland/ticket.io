<?php 

require_once('Config/db.php');

session_start();

if(!isset($_SESSION['login'])) {
    header('location: /ticket.io');
}

$tickets= [];
$col = ["Todo","In progress", "Done", "Close"];

function fetchProjects() {
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM projets');
    return $q->fetchAll();
}
$projects = fetchProjects();

function fetchTypes() {
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM type_ticket');
    return $q->fetchAll();
}
$types = fetchTypes();

function fetchUrgencies() {
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM urgence');
    return $q->fetchAll();
}
$urgencies = fetchUrgencies();

function fetchTicketsTodo(){
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM ticket WHERE tic_intervenant is NULL');
    return $q->fetchAll();
}
$tickets_todo = fetchTicketsTodo();

function fetchTicketsProgress(){
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM ticket WHERE tic_date_prise_en_charge is  not NULL and tic_date_fin_intervention is NULL');
    return $q->fetchAll();
}
$tickets_progress = fetchTicketsProgress();

function fetchTicketsDone(){
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM ticket WHERE tic_date_fin_intervention is  not NULL and tic_date_cloture is NULL');
    return $q->fetchAll();
}
$tickets_done = fetchTicketsDone();

function fetchTicketsClose(){
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM ticket WHERE tic_date_cloture is  not NULL');
    return $q->fetchAll();
}
$tickets_close = fetchTicketsClose();

array_push($tickets, $tickets_todo, $tickets_progress, $tickets_done, $tickets_close);

function fetchTicket($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM ticket WHERE tic_num='.$id);
    return $q->fetchAll();
}

function getProject($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT pro_nom FROM projets WHERE pro_num ='.$id);

    $result  = $q->fetch();

    return $result['pro_nom'];
}

function getUrgency($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT urg_type FROM urgence WHERE urg_num ='.$id);

    $result  = $q->fetch();

    return $result['urg_type'];
}

function cardColor($urgency){
    if($urgency == 'faible'){
        return "card-green";
    } elseif($urgency == 'moyenne'){
        return "card-yellow";
    } else {
        return "card-red";
    }
}

function getTicketType($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT typ_icone FROM type_ticket WHERE typ_num ='.$id);

    $result  = $q->fetch();

    return $result['typ_icone'];
}

function createTicket(){
    include('Config/db.php');
    if($_POST['ticket_project'] === ""){
        $_POST['ticket_project'] = NULL;
    }
    $q = $bdd->prepare('INSERT INTO ticket(tic_titre, tic_description, tic_demandeur, tic_projet, tic_type, tic_urgence, tic_date_creation)
    VALUES (:title, :description, :demandeur, :project, :type, :urgence, :date_creation)');
    $q->execute(array(
        'title' => $_POST["ticket_title"], 
        'description' => $_POST['ticket_description'],
        'demandeur' => $_SESSION['loginId'],
        'project' => $_POST['ticket_project'],
        'type' => $_POST['ticket_type'],
        'urgence' => $_POST['ticket_urgency'],
        'date_creation' => date('Y-m-d H:i:s')
    ));

    header('Location: dashboard.php');
}

function createProject(){
    include('Config/db.php');
    $q = $bdd->prepare('INSERT INTO projets(pro_nom, pro_createur, pro_date_creation)
    VALUES (:nom, :createur, :date_creation)');
    $q->execute(array(
        'nom' => $_POST["project_name"], 
        'createur' => $_SESSION['loginId'],
        'date_creation' => date('Y-m-d H:i:s')
    ));

    header('Location: dashboard.php');
}

function start_intervention($id){
    include('Config/db.php');
    $q = $bdd->prepare('UPDATE ticket SET tic_intervenant =:intervenant, tic_date_prise_en_charge =:date WHERE tic_num='.$id);
    $q->execute(array(
        'intervenant' => $_SESSION['loginId'],
        'date' => date('Y-m-d H:i:s')
    ));

    header('Location: dashboard.php');
}

function end_intervention($id){
    include('Config/db.php');
    $q = $bdd->prepare('UPDATE ticket SET tic_date_fin_intervention =:date WHERE tic_num='.$id);
    $q->execute(array(
        'date' => date('Y-m-d H:i:s')
    ));

    header('Location: dashboard.php');
}

function close_ticket($id){
    include('Config/db.php');
    $q = $bdd->prepare('UPDATE ticket SET tic_date_cloture =:date WHERE tic_num='.$id);
    $q->execute(array(
        'date' => date('Y-m-d H:i:s')
    ));

    header('Location: dashboard.php');
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
    }
}



include('Template/header.php');

include('Template/navbar.php');

?>

<div class="d-flex">

    <?php 
        include('Template/side-bar.php');
        include('Template/board.php');
    ?>
    
</div>

<?php include('Template/footer.php'); ?>