<?php

session_start();
require_once "../DataBaseConnect/Classes/Connexion.php";

$dbh = new Connexion();
$bdd = $dbh->PDOInit();
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$begin=$_POST['begin'];
$end=$_POST['ending'];

$request="SELECT * FROM Festival INNER JOIN Commune ON Commune.id = Festival.id_Commune INNER JOIN Edition ON Festival.id=Edition.id_Festival Where Edition.DateDebut BETWEEN '$begin' AND '$end' OR Edition.DateFin BETWEEN '$begin' AND '$end' ";
$result=$bdd->query($request);
$n = $result->fetchall();

$_SESSION['result']=$n;
$_SESSION['begin']=$begin;
$_SESSION['end']=$end;
echo "Success";
