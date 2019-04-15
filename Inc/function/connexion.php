<?php

$q = $bdd->prepare('SELECT util_num FROM utilisateur WHERE util_login = :login AND util_password = :password');
$q->execute(array('login' => $_POST['login'], 'password' => $_POST['password']));

$result = $q->fetch();

if (count($result) == 0) {
    $error = true;
} else {
    session_start();
    $_SESSION['login']= $_POST['login'];
    $_SESSION['loginId']= $result['util_num'];
    header('Location: dashboard.php'); 
}