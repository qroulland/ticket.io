<?php

function getUrgency($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT urg_type FROM urgence WHERE urg_num ='.$id);

    $result  = $q->fetch();

    return $result['urg_type'];
}

function fetchUrgencies() {
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM urgence');
    return $q->fetchAll();
}
$urgencies = fetchUrgencies();