<?php
/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	session_start();
	
	$titre = "Markers";
	$page = "markers"; //__variable pour la classe "active" du menu-header
 
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');
	require('model/Debug.php');

	try {
		$map = new Map();
		
		//__Ajout d'une information
		if(!empty($_POST)) {
			extract($_POST);
			
			$actif = strip_tags($_POST['actif']);
			$categorie = strip_tags($_POST['category']);
			$ville = strip_tags($_POST['ville']);
			$longitude = strip_tags($_POST['longitude']);
			$latitude = strip_tags($_POST['latitude']);
			$text = strip_tags($_POST['description']);
		
			$insertInfos = $map->getInsertInfo($actif, $categorie, $ville, $longitude, $latitude, $text);
		}
		
		if(!empty($_GET)){
			$id = strip_tags($_GET['id']);
			$deleteInfo = $map->getDeleteInfo($id);
		}
		
		//__ On récupère toutes les infos
		$infos = $map->getInfos();
		$categories = $map->getCategory();
		
		require_once("view/vueMarkers.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}