<?php

function fetchTypes() {
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM type_ticket');
    return $q->fetchAll();
}
$types = fetchTypes();