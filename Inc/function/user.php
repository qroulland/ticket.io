<?php

function getRole($login){
    include('Config/db.php');
    $q = $bdd->query("SELECT util_rol_num FROM utilisateur WHERE util_login ='".$login."'");

    $result  = $q->fetch();

    return $result['util_rol_num'];
}