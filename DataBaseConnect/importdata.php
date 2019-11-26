<?php
require_once "Classes/Connexion.php";
$dbh=new Connexion();

try
{

$bdd = $dbh->PDOInit();
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