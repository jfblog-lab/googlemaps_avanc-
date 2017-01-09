<?php
/*
 * Contrôleur de notre page d'accueil
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	
	include_once("model/BDD.php");
	
	$titre = "Index";
	$page = "index"; //__variable pour la classe "active" du menu-header
	
//__variables pour les balises méta
	$description = "MarkerClusterer Google Maps";
    $title = "page d'accueil du projet MarkerClusterer";
	$keyword = "mot-clé 1, mot-clé 2, mot-clé 3";
    $author = "Guillaume RICHARD";
	
    try {
    	require_once("view/vueIndex.php");
       
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require_once("view/vueErreur.php");
    }
?>