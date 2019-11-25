<?php
require_once "Classes/Connexion.php";

$dbh=new Connexion();
var_dump($dbh);
$dbh->DBCreate();



