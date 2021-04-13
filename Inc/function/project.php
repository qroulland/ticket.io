<?php

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

function getProject($id){
    include('Config/db.php');
    $q = $bdd->query('SELECT pro_nom FROM projets WHERE pro_num ='.$id);

    $result  = $q->fetch();

    return $result['pro_nom'];
}

function fetchProjects() {
    include('Config/db.php');
    $q = $bdd->query('SELECT * FROM projets');
    return $q->fetchAll();
}
$projects = fetchProjects();