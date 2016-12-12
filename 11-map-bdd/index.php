<?php
/*
 * Contrôleur de notre page de maps
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	
	include_once("model/BDD.php");
	include_once("model/Map.php");
	include_once("model/Debug.php");
	
	$titre = "Index";
	$page = "index"; //__variable pour la classe "active" du menu-header
	
//__variables pour les balises méta
	$description = "MarkerClusterer Maps";
	$keyword = "";
    $author = "Guillaume RICHARD";
    $title = "Google Maps et BDD";
	
    try {
    	$map=new Map();
		$categories = $map->getAllCategory();
		
		if (isset($_POST['marker'])) {
			$tabCheckbox = $_POST['marker'];
			$markers = array();
			
			foreach ($tabCheckbox as $checkbox) {
				$catMarkers = $map->getMarkersCategory("Oui", "Oui", $checkbox);
				$markers = array_merge($markers, $catMarkers);
			}
			
			$allMarkersJson = json_encode($markers);
		} else {
			$catMarkers = $map->getAllMarkersActif("Oui", "Oui");
			$allMarkersJson = json_encode($catMarkers);
		}
		
		
		require_once("view/vueIndex.php");
		
       
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require_once("view/vueErreur.php");
    }
?>