<?php
define( 'DB_NAME', 'festoche-fastoche' );
define( 'DB_USER', 'CQCB' );
define( 'DB_PASSWORD', 'CQCB' );
define( 'DB_HOST', 'localhost' );
try {
	$bdd = new PDO('mysql:host=localhost;dbname=festoche-fastoche', 'CQCB', 'CQCB', array(PDO::  MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	/*
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
	}*/

	$insertFestival = ("INSERT INTO festival (nom,url,numIdentif,DateCreation,Periodicite,Longitude,Latitude,id_Commune) 
				SELECT :nom,:url,:numIdentif,:DateCreation,:Periodicite,:Longitude,:Latitude,:id_Commune
				WHERE 
				NOT EXISTS (SELECT * FROM festival WHERE nom = :nom)");
	$i=1;
	$commune = "SELECT * FROM commune";
	foreach ($bdd->query($commune)as $rowF) {
		if (($handleF = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
			while (($dataF = fgetcsv($handleF, 1000, ";")) !== FALSE) {
				if ($rowF['CodePostal'] == $dataF[12]) {
					$statement = $bdd->prepare($insertFestival) or die($bdd->errrorInfo());
					$statement->bindParam(':nom', $dataF[0]);
					$statement->bindParam(':url', $dataF[5]);
					$statement->bindParam(':numIdentif', $dataF[6]);
					$statement->bindParam(':DateCreation', $dataF[11]);
					$statement->bindParam(':Periodicite', $dataF[4]);
					$statement->bindParam(':Longitude', $dataF[14]);
					$statement->bindParam(':Latitude', $dataF[15]);
					$statement->bindParam(':id_Commune', $rowF['id']);
					$statement->execute();
					echo "festival"." ".$i." "."inseree\n";
					$i++;
				}
			}		 
			fclose($handleF); 
		}
	}

	$insertCategorie = ("INSERT INTO categorie (nom) 
				SELECT :nom
				WHERE 
				NOT EXISTS (SELECT * FROM categorie WHERE nom = :nom)");

	if (($handleCategorie = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataCategorie = fgetcsv($handleCategorie, 1000, ";")) !== FALSE) {
			$statement = $bdd->prepare($insertCategorie) or die($bdd->errrorInfo());
			$statement->bindParam(':nom', $dataCategorie[2]);
			$statement->execute();
		}		 
		fclose($handleCategorie); 
	}

	$insertIdCategorie = ("INSERT INTO liencatfest (id_Categorie)
				SELECT :idCat
				WHERE
				NOT EXISTS (SELECT * FROM liencatfest WHERE id_Categorie = :idCat)");

	$insertIdFestival = ("INSERT INTO liencatfest (id_Festival)
				SELECT :idFesti
				WHERE
				NOT EXISTS (SELECT * FROM liencatfest WHERE id_Festival = :idFesti)");

	$categorie = "SELECT * FROM categorie";
	$festival = "SELECT * FROM festival" ;

	if (($handleCategorie = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataFest = fgetcsv($handleCategorie, 1000, ";")) !== FALSE) {
			foreach ($bdd->query($categorie)as $rowC) {
				if ($rowC['nom'] == $dataFest[2]) {
					foreach ($bdd->query($festival)as $rowF) {
						if ($rowC['nom'] == $dataFest[0]) {
							$statementC = $bdd->prepare($insertIdCategorie) or die($bdd->errrorInfo());
							$statementC->bindParam(':idCat', $rowC['id']);
							$statementC->execute();
							$statementF = $bdd->prepare($insertIdCategorie) or die($bdd->errrorInfo());
							$statementF->bindParam(':idFesti', $rowF['id']);
							$statementF->execute();
						}
					}
				}	
			}
		}		 
		fclose($handleCategorie); 
	}
}
catch(exception $e) {
	die('ERREUR : '.$e->getMessage());
}

?>