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
    $q = $bdd->query("SELECT count(tic_projet) FROM ticket WHERE tic_demandeur=".$id." OR tic_intervenant=".$id);

    $result  = $q->fetch();
}

getCountProject(3);