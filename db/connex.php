<?php

try {
    $dbhost = "localhost";
    $dbname = "e2495515";
    $dbuser = "e2495515";
    $dbpass = "r1vxQ31LwS2vHesgiCJb";
    $dbport = 3306;

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;port=$dbport;charset=utf8", $dbuser, $dbpass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}