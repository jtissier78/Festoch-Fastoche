<?php
define( 'DB_NAME', 'festoche-fastoche' );
define( 'DB_USER', 'CQCB' );
define( 'DB_PASSWORD', 'CQCB' );
define( 'DB_HOST', 'localhost' );
try {
	$bdd = new PDO('mysql:host=localhost;dbname=festoche-fastoche', 'CQCB', 'CQCB', array(PDO::  MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$insertRegion =	("INSERT INTO regions (num,nom) 
				SELECT :num,:nom
				WHERE 
				NOT EXISTS (SELECT * FROM regions WHERE nom = :nom)");

	if (($handleR = fopen("../csv/reg2018.csv", "r")) !== FALSE) {
		while (($dataR = fgetcsv($handleR, 1000, ";")) !== FALSE) {
			$statement = $bdd->prepare($insertRegion) or die($bdd->errrorInfo());
			$statement->bindParam(':num', $dataR[0]);
			$statement->bindParam(':nom', $dataR[1]);
			$statement->execute();
		}		 
		fclose($handleR); 
	}

	$insertDepart = ("INSERT INTO departements (num,nom,id_Region) 
				SELECT :num,:nom,:id_Region
				WHERE 
				NOT EXISTS (SELECT * FROM departements WHERE nom = :nom)");

	$region = "SELECT * FROM regions";

	foreach ($bdd->query($region)as $row) {
		if (($handleD = fopen("../csv/depts2018.csv", "r")) !== FALSE) {
			while (($dataR = fgetcsv($handleD, 1000, ";")) !== FALSE) {
				if ($row['num'] == $dataR[0]) {
					$statement = $bdd->prepare($insertDepart) or die($bdd->errrorInfo());
					$statement->bindParam(':num', $dataR[1]);
					$statement->bindParam(':nom', $dataR[2]);
					$statement->bindParam(':id_Region', $row['id']);
					$statement->execute();
				}
			}		 
			fclose($handleD); 
		}
	}

	$insertCommune = ("INSERT INTO commune (CodePostal,nom,id_Departement) 
				SELECT :CodePostal,:nom,:id_Departement
				WHERE 
				NOT EXISTS (SELECT * FROM commune WHERE nom = :nom)");

	$departement = "SELECT * FROM departements";
	
	foreach ($bdd->query($departement)as $rowC) {
		if (($handleC = fopen("../csv/commune.csv", "r")) !== FALSE) {
			while (($dataC = fgetcsv($handleC, 1000, ";")) !== FALSE) {
				if ($rowC['num'] == $dataC[5]) {
					$statement = $bdd->prepare($insertCommune) or die($bdd->errrorInfo());
					$statement->bindParam(':CodePostal', $dataC[1]);
					$statement->bindParam(':nom', $dataC[2]);
					$statement->bindParam(':id_Departement', $rowC['id']);
					$statement->execute();
				}
			}
			fclose($handleC); 
		}
	}

	$insertFestival = ("INSERT INTO festival (nom,url,noIdentif,DateCreation,Periodicite) 
				SELECT :nom,:url,:noIdentif,:DateCreation,:Periodicite
				WHERE 
				NOT EXISTS (SELECT * FROM commune WHERE nom = :nom)");

	if (($handleF = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataF = fgetcsv($handleF, 1000, ";")) !== FALSE) {
			$statement = $bdd->prepare($insertFestival) or die($bdd->errrorInfo());
			$statement->bindParam(':nom', $dataF[0]);
			$statement->bindParam(':url', $dataF[5]);
			$statement->bindParam(':noIdentif', $dataF[6]);
			$statement->bindParam(':DateCreation', $dataF[11]);
			$statement->bindParam(':Periodicite', $dataF[4]);
			$statement->execute();
		}		 
		fclose($handleF); 
	}
	$insertCategorie = ("INSERT INTO categorie (nom) 
				SELECT :nom
				WHERE 
				NOT EXISTS (SELECT * FROM categorie WHERE nom = :nom)");

	if (($handleCat�gorie = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataCategorie = fgetcsv($handleCat�gorie, 1000, ";")) !== FALSE) {
			$statement = $bdd->prepare($insertCategorie) or die($bdd->errrorInfo());
			$statement->bindParam(':nom', $dataCategorie[2]);
			$statement->execute();
		}		 
		fclose($handleCat�gorie); 
	}

}
catch(exception $e) {
	die('ERREUR : '.$e->getMessage());
}

?>