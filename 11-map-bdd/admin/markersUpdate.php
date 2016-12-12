<?php

/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
 
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');
	require('model/Debug.php');
	
	$map = new Map();

	try {
		if(!empty($_GET)){
			$id = strip_tags($_GET['id']);
			
			$info = $map->getIdInfo($id);
			$categories = $map->getCategory();
		
			if(!empty($_POST)){
				$actif = strip_tags($_POST['actif']);
				$categorie = strip_tags($_POST['category']);
				$ville = strip_tags($_POST['ville']);
				$longitude = strip_tags($_POST['longitude']);
				$latitude = strip_tags($_POST['latitude']);
				$text = strip_tags($_POST['description']);
		
				$update = $map->getUpdateInfo($id, $actif, $categorie, $ville, $longitude, $latitude, $text);
			
				header('Location: markers.php');
			}
		}
		
		require_once("view/vueMarkersUpdate.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}