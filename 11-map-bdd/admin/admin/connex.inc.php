<?php
/*
 * Permet la connexion à la partie back-office
 */
	if ("localhost" == $_SERVER['HTTP_HOST']){
		//__variable locale lié à la classe
		$localhost = 'mysql:host=localhost;port=3306;dbname=mapbdd;charset=utf8';
		$user = 'root';
		$password = '';
	} elseif ("domaine-distant" == $_SERVER['HTTP_HOST']){
		//__variable OVH lié à la classe
	    $localhost = 'mysql:host=HOST;dbname=BDNAME;charset=utf8';
		$user = 'USER';
		$password = 'PASSWORD';
	}

	try{
		$cnx = new PDO($localhost, $user, $password);
   		$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Obligatoire pour la suite
	}catch (PDOException $error){	
		echo 'N : '.$error->getCode().'<br />';
		die ('Erreur : '.$error->getMessage().'<br />');
	}

?>