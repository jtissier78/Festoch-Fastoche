<?php
<<<<<<< HEAD

define( 'DB_NAME', 'festoche-fastoche' );
define( 'DB_USER', 'CQCB' );
define( 'DB_PASSWORD', 'CQCB' );
define( 'DB_HOST', 'localhost' );

try {
	$bdd = new PDO('mysql:host=localhost;dbname=festoche-fastoche', 'CQCB', 'CQCB', array(PDO::  MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$insertRegion =	("INSERT INTO regions (num,nom) 
				SELECT :nom,:num
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
=======
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
>>>>>>> 3ecdcbf2ad344f68a7df6cd609ade71b68158755

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
	$i=1;
	$j=1;
	$k=1;
	$l=1;
	foreach ($bdd->query($departement)as $rowC) {
		var_dump($rowC);
		echo "ligne ".$i."de la table departement";
		if (($handleC = fopen("../csv/commune.csv", "r")) !== FALSE) {
			echo "ouverture du csv";
			/*while (($dataC = fgetcsv($handleC, 1000, ";")) !== FALSE) {
				echo "ligne ".$j."du csv";
				echo $rowC['num'];
				echo $dataC[5];
				if ($rowC['num'] == $dataC[5]){
					echo $k." comparaison validé";
					$k++;
					$statement = $bdd->prepare($insertCommune) or die($bdd->errrorInfo());
					$statement->bindParam(':CodePostal', $dataC[1]);
					$statement->bindParam(':nom', $dataC[2]);
					$statement->bindParam(':id_Departement', $rowC['id']);
					$statement->execute();
					echo $l."insertion ok";
					$l++;
				}
				else {
					echo "comparaison non validée";
				}
				$j++;
			}	*/
			fclose($handleC); 
		}$i++;
	}
}
catch(exception $e) {
	die('ERREUR : '.$e->getMessage());
}

?>