<?php
$servername = "remotemysql.com";
$table = "HYiH2Cm7zL";
$username = "HYiH2Cm7zL";
$password = "YBZuqVVDIh";

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