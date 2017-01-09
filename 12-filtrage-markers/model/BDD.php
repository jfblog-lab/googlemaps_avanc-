<?php
/*
 * Classe BDD pour se connecter à la BDD
 * permet l'accès à la BDD à partir des fonctions des classes enfants
 */


class BDD {
	var $localhost = "", $user = "", $password = "";

//__Effectue la connexion à la BDD
//__Instancie et renvoie l'objet PDO associé
    function getBdd() {
    	if ("localhost" == $_SERVER['HTTP_HOST']){
			//__variable locale lié à la classe
			$localhost = 'mysql:host=localhost;dbname=MarkerClusterer;charset=utf8';
			$user = 'root';
			$password = '';
		} elseif ("VOTRE-NOM-DE-DOMAINE" == $_SERVER['HTTP_HOST']){
			//__variable OVH lié à la classe
		    $localhost = 'mysql:host=<votre-host>;dbname=<nom-de-votre-BDD>;charset=utf8';
			$user = ''; //__votre nom d'utilisateur
			$password = ''; //__votre pasword
		}
		
		
    	$bdd = new PDO($localhost, $user, $password);
   		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        return $bdd;
    }

//__Effectue un SELECT sur la BDD
	function SELECT( $select ) {
		return $sql = "SELECT ".$select;
	}

//__Effectue un FROM d'une (ou plusieurs) table(s)
	function FROM( $from ) {
		return $sql = " FROM ".$from;
	}
	
//__Effectue un WHERE
	function WHERE( $where ) {
		return $sql = " WHERE ".$where;
	}
	
//__Effectue un AND
	function WHEREAND( $and ) {
		return $sql = " AND ".$and;
	}
	
//__Effectue un GROUP BY
	function GROUPBY( $groupby ) {
		return $sql = " GROUP BY ".$groupby;
	}
	 
//__Effectue un ORDER BY selon une (ou plusieurs) colonne(s)
	function ORDERBY( $order, $clause = "ASC" ) {
		$sql = " ORDER BY ".$order;
		
		if (!empty($clause)){
			$sql .= " ".$clause;
		}
		
		return $sql;
	}
	
//__Effectue un LIMIT d'une (ou plusieurs) table(s)
	function LIMIT( $limit ) {
		if (empty($limit)){
			$sql = " LIMIT 10";
		} else {
			$sql = " LIMIT ".$limit;
		}
		
		return $sql;
	}
	
//__Effectue un INSERT INTO sur la BDD
	function INSERTINTO( $insert ) {
		return $sql = "INSERT INTO ".$insert;
	}
	
//__Effectue un VALUES sur la BDD
	function VALUES( $values ) {
		return $sql = " VALUES (".$values.")";
	}
}

$BDD = new BDD();
