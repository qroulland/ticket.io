<?php
$servername = "localhost";
$table = "gest-tickets";
$username = "root";
$password = "root";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$table", $username, $password);
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>