<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$array = array();
	$responseCode = 500;
	
	/* si la requête est bien en Ajax et la méthode en GET ... */
	if((strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest') && ($_SERVER['REQUEST_METHOD'] == 'GET')){
		/* on récupère le terme et on le duplique en terme en transformant les espaces en tirets et tirets en espaces (au cas ou) */
		$q = str_replace("''","'",urldecode($_REQUEST['name']));
		$q = strtolower(str_replace("'","''",$q));
		$qTiret = str_replace(' ','-',$q);
		$qSpace = str_replace('-',' ',$q);
		$array = array();
		
		session_start();
		require_once "../DataBaseConnect/Classes/Connexion.php";
		
		/* creation de la requête SQL */
		$query=$connexion->query('SELECT Commune.id, Commune.nom, Commune.CodePostal FROM Commune WHERE (Commune.nom LIKE \'%'.$q.'%\' OR Commune.nom LIKE \'%'.$qTiret.'%\' OR Commune.nom LIKE \'%'.$qSpace.'%\' OR Commune.CodePostal LIKE \'%'.$q.'%\') ORDER BY Commune.nom ASC');
		$query->setFetchMode(PDO::FETCH_OBJ);
		
		/* remplissage du tableau avec les termes récupéré en requete (ou non) */
		while($q = $query->fetch()){
			$name = utf8_encode($q->name);
			
			$postalcode = utf8_encode($q->postalcode);
			$array[] = array(
					'id' => $q->id,
					'label' => $name.' ('.$postalcode.')',
					'value' => $name.' ('.$postalcode.')',
			);
		}
		$query->closeCursor();
				
		//die(print_r($array));
		
		$responseCode = 200;
	}
	
	/* génération réponse JSON */
	http_response_code($responseCode);
	header('Content-Type: application/json');
	echo json_encode($array);
?>