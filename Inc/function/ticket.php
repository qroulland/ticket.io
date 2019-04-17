<?php

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

function fetchTicket($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM ticket WHERE tic_num='.$id);
    return $q->fetchAll();
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

function getIntervenant($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT tic_intervenant FROM ticket WHERE tic_num ='.$id);

    $result  = $q->fetch();

    return $result['tic_intervenant'];
}

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

function start_intervention($id){
    include('Config/db.php');
    $q = $bdd->prepare('UPDATE ticket SET tic_intervenant =:intervenant, tic_date_prise_en_charge =:date WHERE tic_num='.$id);
    $q->execute(array(
        'intervenant' => $_SESSION['loginId'],
        'date' => date('Y-m-d H:i:s')
    ));

    header('Location: dashboard.php');
}

function return_to_TD($id){
    include('Config/db.php');
    $q = $bdd->prepare('UPDATE ticket SET tic_intervenant =:intervenant, tic_date_prise_en_charge =:date WHERE tic_num='.$id);
    $q->execute(array(
        'intervenant' => NULL,
        'date' => NULL
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

function return_to_SI($id){
    include('Config/db.php');
    $q = $bdd->prepare('UPDATE ticket SET tic_date_fin_intervention =:date WHERE tic_num='.$id);
    $q->execute(array(
        'date' => NULL
    ));

    header('Location: dashboard.php');
}