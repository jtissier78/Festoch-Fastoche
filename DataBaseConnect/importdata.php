<?php
require_once "Classes/Connexion.php";

try {
	$dbh = new Connexion();
	$bdd = $dbh->PDOInit();
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
			echo $dataR[1]." "."ok\n";
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
					echo $dataR[2]." "."ok\n";
				}
			}		 
			fclose($handleD); 
		}
	}

	$insertCommune = ("INSERT INTO commune (CodePostal,CodeInsee,nom,id_Departement) 
				SELECT :CodePostal,:CodeInsee,:nom,:id_Departement
				WHERE 
				NOT EXISTS (SELECT * FROM commune WHERE CodeInsee = :CodeInsee)");

	$departement = "SELECT * FROM departements";
	
	foreach ($bdd->query($departement)as $rowC) {
		if (($handleC = fopen("../csv/commune.csv", "r")) !== FALSE) {
			while (($dataC = fgetcsv($handleC, 1000, ";")) !== FALSE) {
				if ($rowC['num'] == $dataC[5]) {
					$statement = $bdd->prepare($insertCommune) or die($bdd->errrorInfo());
					$statement->bindParam(':CodePostal', $dataC[1]);
					$statement->bindParam(':CodeInsee', $dataC[0]);
					$statement->bindParam(':nom', $dataC[2]);
					$statement->bindParam(':id_Departement', $rowC['id']);
					$statement->execute();
					echo $dataC[2]." "."ok\n";
				}
			}
			fclose($handleC); 
		}
	} 
	
	$insertFestival = ("INSERT INTO festival (nom,url,numIdentif,DateCreation,Periodicite,Longitude,Latitude,id_Commune) 
				SELECT :nom,:url,:numIdentif,:DateCreation,:Periodicite,:Longitude,:Latitude,:id_Commune
				WHERE 
				NOT EXISTS (SELECT * FROM festival WHERE nom = :nom)");

	$commune = "SELECT * FROM commune";
	
 	if (($handleF = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataF = fgetcsv($handleF, 1000, ";")) !== FALSE) {
			$ci=$dataF[13];
			$cp2= "SELECT id FROM commune where CodeInsee = :CI";
			$statement = $bdd->prepare($cp2);
			$statement->bindParam(':CI', $ci);
			$statement->execute();
			$c= $statement->fetch();
			$ci = $c[0];
			$statement = $bdd->prepare($insertFestival);
			$statement->bindParam(':nom', $dataF[0]);
			$statement->bindParam(':url', $dataF[5]);
			$statement->bindParam(':numIdentif', $dataF[6]);
			$statement->bindParam(':DateCreation', ConvertToDate($dataF[11]));		//TODO Change to format date for sql
			$statement->bindParam(':Periodicite', $dataF[4]);
			$statement->bindParam(':Longitude', $dataF[14]);
			$statement->bindParam(':Latitude', $dataF[15]);
			$statement->bindParam(':id_Commune', $ci);
			$statement->execute();
			echo $dataF[0]." "."ok\n";
		}
	fclose($handleF); 
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

	$LienCateFest= ("INSERT INTO liencatfest (id_Categorie,id_Festival)
				SELECT :idCat,:idFesti
				WHERE
				NOT EXISTS (SELECT * FROM liencatfest WHERE id_Festival = :idFesti)"); 

	$selectCategorie = "SELECT id FROM categorie where nom = :nom"; 
	$selectFestival = "SELECT id FROM festival where nom = :nom2";

	if (($handleCategorieL = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataFest = fgetcsv($handleCategorieL, 1000, ";")) !== FALSE) {
			$cat = $dataFest[2];	
			$fest = $dataFest[0];			
			$statement = $bdd->prepare($selectCategorie);
			$statement->bindParam(':nom', $cat);
			$statement->execute();	
			$idCats= $statement->fetch();
			$idCat = $idCats[0];	
			$statement = $bdd->prepare($selectFestival) or die($bdd->errrorInfo());
			$statement->bindParam(':nom2', $fest);
			$statement->execute();
			$idFests= $statement->fetch();
			$idFest = $idFests[0];
			$statement3 = $bdd->prepare($LienCateFest) or die($bdd->errrorInfo());
			$statement3->bindParam(':idCat', $idCat);
			$statement3->bindParam(':idFesti', $idFest);
			$statement3->execute(); 
			echo $dataFest[0]." "."ok\n";
		}		
		fclose($handleCategorieL);  
	} 

	$LienCateFest= ("INSERT INTO edition (Annee,DateDebut,DateFin,id_Festival)
				SELECT :annee,:datedebut,:datefin,:idfesti
				WHERE
				NOT EXISTS (SELECT * FROM edition WHERE id_Festival = :idfesti)"); 

	$IdFestival = "SELECT id FROM festival where nom = :nom";

	if (($handleCategorieL = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataDate = fgetcsv($handleCategorieL, 1000, ";")) !== FALSE) {
			$a = "2019";
			$dateD = $dataDate[9];			//TODO Change to format date for sql
			$dateF = $dataDate[10];			//TODO Change to format date for sql
			$dateN = $dataDate[0];
			$statement = $bdd->prepare($IdFestival);
			$statement->bindParam(':nom', $dateN);
			$statement->execute();	
			$dateNom= $statement->fetch();
			$Dn = $dateNom[0];	
			$statement = $bdd->prepare($LienCateFest) or die($bdd->errrorInfo());
			$statement->bindParam(':annee', $a);
			$statement->bindParam(':datedebut', ConvertToDate($dateD));
			$statement->bindParam(':datefin', ConvertToDate($dateF));			
			$statement->bindParam(':idfesti', $Dn);
			$statement->execute(); 
			echo $dataDate[0]." "."ok\n";
		}
	}

}
catch(exception $e) {
	die('ERREUR : '.$e->getMessage());
}

try {
	$dbh = new Connexion();
	$bdd = $dbh->PDOInit();
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
			echo $dataR[1]." "."ok\n";
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
					echo $dataR[2]." "."ok\n";
				}
			}		 
			fclose($handleD); 
		}
	}

	$insertCommune = ("INSERT INTO commune (CodePostal,CodeInsee,nom,id_Departement) 
				SELECT :CodePostal,:CodeInsee,:nom,:id_Departement
				WHERE 
				NOT EXISTS (SELECT * FROM commune WHERE CodeInsee = :CodeInsee)");

	$departement = "SELECT * FROM departements";
	
	foreach ($bdd->query($departement)as $rowC) {
		if (($handleC = fopen("../csv/commune.csv", "r")) !== FALSE) {
			while (($dataC = fgetcsv($handleC, 1000, ";")) !== FALSE) {
				if ($rowC['num'] == $dataC[5]) {
					$statement = $bdd->prepare($insertCommune) or die($bdd->errrorInfo());
					$statement->bindParam(':CodePostal', $dataC[1]);
					$statement->bindParam(':CodeInsee', $dataC[0]);
					$statement->bindParam(':nom', $dataC[2]);
					$statement->bindParam(':id_Departement', $rowC['id']);
					$statement->execute();
					echo $dataC[2]." "."ok\n";
				}
			}
			fclose($handleC); 
		}
	}
	
	$insertFestival = ("INSERT INTO festival (nom,url,numIdentif,DateCreation,Periodicite,Longitude,Latitude,id_Commune) 
				SELECT :nom,:url,:numIdentif,:DateCreation,:Periodicite,:Longitude,:Latitude,:id_Commune
				WHERE 
				NOT EXISTS (SELECT * FROM festival WHERE nom = :nom)");

	$commune = "SELECT * FROM commune";
	
 	if (($handleF = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataF = fgetcsv($handleF, 1000, ";")) !== FALSE) {
			$ci=$dataF[13];
			$cp2= "SELECT id FROM commune where CodeInsee = :CI";
			$statement = $bdd->prepare($cp2);
			$statement->bindParam(':CI', $ci);
			$statement->execute();
			$c= $statement->fetch();
			$ci = $c[0];
			$statement = $bdd->prepare($insertFestival);
			$statement->bindParam(':nom', $dataF[0]);
			$statement->bindParam(':url', $dataF[5]);
			$statement->bindParam(':numIdentif', $dataF[6]);
			$statement->bindParam(':DateCreation', $dataF[11]);
			$statement->bindParam(':Periodicite', $dataF[4]);
			$statement->bindParam(':Longitude', $dataF[14]);
			$statement->bindParam(':Latitude', $dataF[15]);
			$statement->bindParam(':id_Commune', $ci);
			$statement->execute();
			echo $dataF[0]." "."ok\n";
		}
	fclose($handleF); 
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

	$LienCateFest= ("INSERT INTO liencatfest (id_Categorie,id_Festival)
				SELECT :idCat,:idFesti
				WHERE
				NOT EXISTS (SELECT * FROM liencatfest WHERE id_Festival = :idFesti)"); 

	$selectCategorie = "SELECT id FROM categorie where nom = :nom"; 
	$selectFestival = "SELECT id FROM festival where nom = :nom2";

	if (($handleCategorieL = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataFest = fgetcsv($handleCategorieL, 1000, ";")) !== FALSE) {
			$cat = $dataFest[2];	
			$fest = $dataFest[0];			
			$statement = $bdd->prepare($selectCategorie);
			$statement->bindParam(':nom', $cat);
			$statement->execute();	
			$idCats= $statement->fetch();
			$idCat = $idCats[0];	
			$statement = $bdd->prepare($selectFestival) or die($bdd->errrorInfo());
			$statement->bindParam(':nom2', $fest);
			$statement->execute();
			$idFests= $statement->fetch();
			$idFest = $idFests[0];
			$statement3 = $bdd->prepare($LienCateFest) or die($bdd->errrorInfo());
			$statement3->bindParam(':idCat', $idCat);
			$statement3->bindParam(':idFesti', $idFest);
			$statement3->execute(); 
			echo $dataFest[0]." "."ok\n";
		}		
		fclose($handleCategorieL);  
	} 

	$LienCateFest= ("INSERT INTO edition (Annee,DateDebut,DateFin,id_Festival)
				SELECT :annee,:datedebut,:datefin,:idfesti
				WHERE
				NOT EXISTS (SELECT * FROM edition WHERE id_Festival = :idfesti)"); 

	$IdFestival = "SELECT id FROM festival where nom = :nom";

	if (($handleCategorieL = fopen("../csv/panorama-des-festivals.csv", "r")) !== FALSE) {
		while (($dataDate = fgetcsv($handleCategorieL, 1000, ";")) !== FALSE) {
			$a = "2019";
			$dateD = $dataDate[9];
			$dateF = $dataDate[10];
			$dateN = $dataDate[0];
			$statement = $bdd->prepare($IdFestival);
			$statement->bindParam(':nom', $dateN);
			$statement->execute();	
			$dateNom= $statement->fetch();
			$Dn = $dateNom[0];	
			$statement = $bdd->prepare($LienCateFest) or die($bdd->errrorInfo());
			$statement->bindParam(':annee', $a);
			$statement->bindParam(':datedebut', $dateD);
			$statement->bindParam(':datefin', $dateF);
			$statement->bindParam(':idfesti', $Dn);
			$statement->execute(); 
			echo $dataDate[0]." "."ok\n";
		}
	}

}
catch(exception $e) {
	die('ERREUR : '.$e->getMessage());
}

function ConvertToDate(string $date)
{
	echo "$date ";
	$newDate=explode("/",$date);
	var_dump ($newDate);
	if (isset($newDate[1])) {
		$resultDate="$newDate[2]-$newDate[1]-$newDate[0]";
	}else {
		$resultDate=Null;
	}									
						
	return $resultDate;
}
?>