<?php
session_start();
require_once "../DataBaseConnect/Classes/Connexion.php";

$dbh = new Connexion();
$bdd = $dbh->PDOInit();
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$longitude=$_POST['longitude'];
$latitude=$_POST['latitude'];
$distance=$_POST['distance'];

$request="SELECT *, SQRT(POW(Longitude-$longitude,2)+POW(Latitude-$latitude,2)) AS Distance FROM Festival HAVING Distance <= $distance";
$result=$bdd->query($request);
$n = $result->fetchall();
$_SESSION['result']=$n;

echo "Success";

