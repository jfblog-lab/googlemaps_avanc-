<?php
/*
 * Contrôleur des différentes pages de veille
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	session_start();
	
	$titre = "Compte";
	$page = "compte"; //__variable pour la classe "active" du menu-header
 
//__inclusion des différentes classes

	try {
		require_once("view/vueCompte.php");
		
	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	    require_once("view/vueErreur.php");
	}