<?php
 /*
 * Contrôleur de la page de compte
 * gère la dynamique de l'application. Elle fait le lien entre l'utilisateur et le reste de l'application
 */
	
	$page="identification"; //__variable spécifique à la page
	
	//__$message d'erreur lors de la connexion
	if(isset($_GET['erreur']) && ($_GET['erreur'] == "login")){ $message = "login ou mot de passe incorrect";}
	elseif(isset($_GET['erreur']) && ($_GET['erreur'] == "intru")){	$message = "Echec d'identification !!!";}
	elseif(isset($_GET['erreur']) && ($_GET['erreur'] == "session")){$message = "Session expirée";}

	try {
		require_once("view/vueIdentification.php");
	} catch (Exception $e) {
		$msgErreur = $e->getMessage();
		require_once("view/vueErreur.php");
	}
?>