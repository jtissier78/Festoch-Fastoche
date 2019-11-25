<?php
require_once "Classes/Connexion.php";

$dbh=new Connexion();
var_dump($dbh);
$dbh->DBCreate();

/* $dbh->sendRequest("CREATE TABLE IF NOT EXISTS Roles(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    nom TEXT)"); *//* Test sendRequest OK. */


