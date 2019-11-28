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
					echo $k." comparaison valid�";
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
					echo "comparaison non valid�e";
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