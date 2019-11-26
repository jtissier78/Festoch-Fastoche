<?php

define( 'DB_NAME', 'festoche-fastoche' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );

try
{

$bdd = new PDO('mysql:host=localhost;dbname=festoche-fastoche', 'root', '', array(PDO::  MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$i=0;
if (($handle2 = fopen("ff.csv", "r")) !== FALSE) {
    while (($data2 = fgetcsv($handle2, 1000, ";")) !== FALSE) {
            $statement = $bdd->prepare("INSERT INTO regions (nom) VALUES (:nom)");
            $statement->bindParam(':nom', $data2[1]);
            $statement->execute(array("nom" => $data2[1]));

        }
    }
    fclose($handle2);  
}


catch(exception $e)
{
die('ERREUR : '.$e->getMessage());
}
?>