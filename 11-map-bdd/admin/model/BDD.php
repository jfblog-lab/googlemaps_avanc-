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
			$localhost = 'mysql:host=localhost;dbname=mapbdd;charset=utf8';
			$user = 'root';
			$password = '';
		} elseif ("domaine-distant" == $_SERVER['HTTP_HOST']){
			//__variable OVH lié à la classe
		    $localhost = 'mysql:host=HOST;dbname=BDNAME;charset=utf8';
			$user = 'USER';
			$password = 'PASSWORD';
		}
		
    	$bdd = new PDO($localhost, $user, $password);
   		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        return $bdd;
    }
	
//__Fonction de connexion pour le back-office
	function getConnexion( $idClef ) {
        $bdd = self::getBdd();
        $sql = "SELECT *";
		$sql .= "FROM `markers_user`";
		$sql .= "WHERE idclef='".$idClef."' ";
                
        $user = $bdd->query($sql);

		if ($resultat = $user->fetch(PDO::FETCH_OBJ)) {
            $user = $resultat;
        }
        return $user; // Accès au résultat
    }
}

$BDD = new BDD();
