<?php

function fetchTypes() {
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM type_ticket');
    return $q->fetchAll();
}
$types = fetchTypes();

function getIconType($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT typ_icone FROM type_ticket WHERE typ_num ='.$id);

    $result  = $q->fetch();

    return $result['typ_icone'];
}

?>
