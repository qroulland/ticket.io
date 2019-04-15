<?php

function getRole($login){
    include('Config/db.php');
    $q = $bdd->query("SELECT util_rol_num FROM utilisateur WHERE util_login ='".$login."'");

    $result  = $q->fetch();

    return $result['util_rol_num'];
}

function getUsers(){
    include('Config/db.php');
    $q = $bdd->query("SELECT * FROM utilisateur");

    $result  = $q->fetchAll();

    return $result;
}

$users = getUsers();