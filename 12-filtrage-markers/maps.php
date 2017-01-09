<?php
/*
 * Contrôleur de notre page de maps
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	
	include_once("model/BDD.php");
	include_once("model/Map.php");
	
	$titre = "Maps";
	$page = "maps"; //__variable pour la classe "active" du menu-header
	
//__variables pour les balises méta
	$description = "MarkerClusterer Maps";
	$keyword = "";
    $author = "Guillaume RICHARD";
    $title = "MarkerClusterer Maps";
	
    try {
    	$map=new Map();
		
		$departements = $map->getDepartements( ); //_On affiche les départements dans une liste déroulante
		
		if(!empty($_POST)){	
			extract($_POST);
			
			if(!empty($departement)) {
				$departement = $_POST['departement'];
			} else {
				$departement = "";
			}
			$habitants = $_POST['habitants'];
			
			switch ($habitants) {
				case "moins100":
					$stations = $map->getVilles(1, 101, $departement);
	    			$stationsCount = $map->getCount(1, 101, $departement);
					break;
				case "medium100-250":
					$stations = $map->getVilles(101, 250, $departement);
	    			$stationsCount = $map->getCount(101, 250, $departement);
					break;
				case "medium250-500":
					$stations = $map->getVilles(251, 500, $departement);
	    			$stationsCount = $map->getCount(251, 500, $departement);
					break;
				case "medium500-1000":
					$stations = $map->getVilles(501, 1000, $departement);
	       			$stationsCount = $map->getCount(501, 1000, $departement);
					break;
				case "medium1000-2500":
					$stations = $map->getVilles(1001, 2500, $departement);
	    			$stationsCount = $map->getCount(1001, 2500, $departement);
					break;
				case "medium2500-5000":
					$stations = $map->getVilles(2501, 5000, $departement);
	    			$stationsCount = $map->getCount(2501, 5000, $departement);
					break;
				case "medium5000-10000":
					$stations = $map->getVilles(5001, 10000, $departement);
	    			$stationsCount = $map->getCount(5001, 10000, $departement);
					break;
				case "plus10000":
					$stations = $map->getVilles(10001, null, $departement);
	    			$stationsCount = $map->getCount(10001, null, $departement);
					break;
			}
		} else {
			$nbVille = 10;
			$stations = $map->getSimple($nbVille);
       		$stationsCount[0] = $nbVille;
		}
		
		
		$filename= "common/js/points.json";
		
		if (file_exists($filename)){
			unlink($filename);
		}else{
			echo "le fichier json n'existe pas.<br />";
		}
		
		$id = $stationsCount[0]+1;
		$json = 'marker = [';
		while ($resultat = $stations->fetch(PDO::FETCH_OBJ)){
			$id--;
			$json .= "[";
			$json .= number_format($resultat->latitude, 5).",";
			$json .= number_format($resultat->longitude, 5).",";
			
			if(!empty($resultat->ville)){
				$json .= '"'.utf8_decode($resultat->ville).'",';
			} else {
				$json .= '"",';
			}
			if(!empty($resultat->ville_population_2010)){
				$json .= '"'.$resultat->ville_population_2010.'",';
			} else {
				$json .= '"",';
			}
			
			$json .= '"'.$resultat->id.'",';

			if ("1" == $id){
				$json .= '"'.$id.'"]';
			}else if ("1" != $id){
				$json .= '"'.$id.'"],';
			}
		} //fin de la boucle while
		$json .= '];';

		file_put_contents($filename,utf8_encode($json));
		chmod($filename, 0777);
		
    	require_once("view/vueMaps.php");
       
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require_once("view/vueErreur.php");
    }
?>
