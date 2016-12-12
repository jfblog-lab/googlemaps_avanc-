<?php
/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	session_start();
	
	$titre = "Category";
	$page = "category"; //__variable pour la classe "active" du menu-header
 
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');
	require('model/Debug.php');

	try {
		$map = new Map();
		
		//__Ajout d'une information
		if(!empty($_POST)) {
			extract($_POST);
			
			$categorie = strip_tags($_POST['category']);
			$actif = strip_tags($_POST['actif']);
			$image = strip_tags($_POST['image']);
		
			$insertInfos = $map->getInsertCategory($category, $actif, $image);
		}
		
		if(!empty($_GET)){
			$id = strip_tags($_GET['id']);
			$deleteInfo = $map->getDeleteCategory($id);
		}
		
		$categories = $map->getCategory(); //__ On récupère toutes les catégories
		
		require_once("view/vueCategory.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}