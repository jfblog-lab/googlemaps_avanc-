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
			
			$info = $map->getIdInfosCat($id);
			$categories = $map->getCategory();
			
			if(!empty($_POST)){
				$categorie = strip_tags($_POST['category']);
				$actif = strip_tags($_POST['actif']);
				$image = strip_tags($_POST['image']);
		
				$update = $map->getUpdateCat($id, $actif, $categorie, $image);
			
				header('Location: category.php');
			}
		}
		
		require_once("view/vueCategoryUpdate.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}