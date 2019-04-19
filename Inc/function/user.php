<?php

function getRole($login){
    include('Config/db.php');
    $q = $bdd->query("SELECT util_rol_num FROM utilisateur WHERE util_login ='".$login."'");

    $result  = $q->fetch();

    return $result['util_rol_num'];
}

function getRoleLibelle($id){
    include('Config/db.php');
    $q = $bdd->query("SELECT rol_type FROM roles WHERE rol_num =".$id);

    $result  = $q->fetch();

    return $result['rol_type'];
}

function getRoles(){
    include('Config/db.php');
    $q = $bdd->query("SELECT * FROM roles");

    $result  = $q->fetchAll();

    return $result;
}
$roles = getRoles();

function getUsers(){
    include('Config/db.php');
    $q = $bdd->query("SELECT * FROM utilisateur");

    $result  = $q->fetchAll();

    return $result;
}

$users = getUsers();

function getUser($id){
    include('Config/db.php');
    $q = $bdd->query("SELECT util_login FROM utilisateur WHERE util_num =".$id);

    $result  = $q->fetch();

    return $result['util_login'];
}

function removeUser($id){
    include('Config/db.php');
    $q = $bdd->query("DELETE FROM utilisateur WHERE util_num=".$id);

    header('Location: users.php');
}

function createUser(){
    include('Config/db.php');

    $q = $bdd->prepare('INSERT INTO utilisateur(util_nom, util_prenom, util_login, util_password, util_mail, util_rol_num)
    VALUES (:nom, :prenom, :login, :password, :email, :rol_num)');
    $q->execute(array(
        'nom' => $_POST["user_nom"], 
        'prenom' => $_POST['user_prenom'],
        'login' => $_POST['user_login'],
        'password' => $_POST['user_password'],
        'email' => $_POST['user_email'],
        'rol_num' => $_POST['user_role']
    ));

    header('Location: users.php');
}

function getCountProject($id){
    include('Config/db.php');
    $q = $bdd->query("SELECT count(DISTINCT tic_projet) as num from ticket where tic_demandeur =".$id." or tic_intervenant =".$id);

    $result  = $q->fetch();

    return $result['num'];
}

function getNumberCreateTickets($loginId){
    include('Config/db.php');
    $q = $bdd->query("SELECT count(*) as num FROM ticket WHERE tic_demandeur =".$loginId);

    $result  = $q->fetch();

    return $result['num'];
}

function getNumberTicketsPause($loginId){
    include('Config/db.php');
    $q = $bdd->query("SELECT count(*) as num FROM ticket WHERE tic_demandeur =".$loginId." AND tic_intervenant is NULL");

    $result  = $q->fetch();

    return $result['num'];
}


function getNumberTicketsClose($loginId){
    include('Config/db.php');
    $q = $bdd->query("SELECT count(*) as num FROM ticket WHERE tic_demandeur =".$loginId." AND tic_date_cloture is not NULL");

    $result  = $q->fetch();

    return $result['num'];
}

function getNumberTicketIntervention($loginId){
    include('Config/db.php');
    $q = $bdd->query("SELECT count(*) as num FROM ticket WHERE tic_intervenant =".$loginId);

    $result  = $q->fetch();

    return $result['num'];
}

function getTimeIntervention($loginId){
    include('Config/db.php');
    $q = $bdd->query("SELECT SUM(TIMESTAMPDIFF(minute,tic_date_prise_en_charge,tic_date_fin_intervention)) AS total FROM ticket where tic_date_fin_intervention is not null and tic_intervenant=".$loginId);

    $result  = $q->fetch();

    return $result['total'];
}

function convertToHoursMins($time) {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);

    return $result = [$hours, $minutes];
}

if($_SESSION['loginRole'] == 1){
    $NumberTicketsCreate = getNumberCreateTickets($_SESSION['loginId']);
    $NumberTicketsPause = getNumberTicketsPause($_SESSION['loginId']);
    $NumberTicketsClose = getNumberTicketsClose($_SESSION['loginId']);
} else {
    $NumberTicketsIntervention = getNumberTicketIntervention($_SESSION['loginId']);
    $NumberProjects = getCountProject($_SESSION['loginId']);
    $TimeIntervention = ConvertToHoursMins(getTimeIntervention($_SESSION['loginId']));

    if(strlen(strval($TimeIntervention[1])) === 1){
        $TimeIntervention[1] = "0".strval($TimeIntervention[1]);
    }

}