<?php
/*
 * Modele de classe PHP : Map.php
 * Classe d'affichage des markers sur une Google Maps
 */

class Map extends BDD{
//__variable lié à la classe

//__Affiche le centre de la France
//__Calcul fait grâce à la somme des coordonnées de toutes les villes de France (même la Corse) 
    function getCentre( ) {
        $bdd = parent::getBdd();
		
		$sql = parent::SELECT('`ville_id` AS id, SUM(`ville_longitude_deg`)/36568 AS longitude, SUM(`ville_latitude_deg`)/36568 AS latitude');
		$sql .= parent::FROM('`markers_villes`');
		$sql .= parent::LIMIT('`1`');
		
        $datas = $bdd->query($sql);
		
        return $datas; // Accès au résultat
    }


//__ Affiche les X villes les plus grandes
//__ Valeur de base à 5, mais elle peut-être modifié
    function getSimple( $limit = 5 ) {
        $bdd = parent::getBdd();
		
		$sql = parent::SELECT('`ville_id` AS id, `ville_population_2010` , `ville_nom_reel` AS ville, `ville_longitude_deg` AS longitude, `ville_latitude_deg` AS latitude');
		$sql .= parent::FROM('`markers_villes`');
		$sql .= parent::ORDERBY('`ville_population_2010`', 'DESC');
		$sql .= parent::LIMIT( $limit );
		
        $datas = $bdd->query($sql);
		
        return $datas; // Accès au résultat
    }
	
//__Affiche l'ensemble des départements Français
//__l'ordre est fait selon les noms de départements
    function getDepartements( ) {
        $bdd = parent::getBdd();
		
		$sql = parent::SELECT('id_departement as id, nom_departement as departement');
		$sql .= parent::FROM('`markers_departements`');
		$sql .= parent::ORDERBY('`departement`');
		
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch()) {
            $billet[] = $resultat;
        }
		
        return $billet; // Accès au résultat
    }
	
//__Affiche les villes selon un nombre déterminé d'habitants
//__Permet de choisir le MIN et le MAX d'habitants que l'on veut 
    function getVilles( $populationStart = "", $populationEnd = "", $departement = "", $order = "" ) {
        $bdd = parent::getBdd();
		
		$sql = parent::SELECT('`ville_id` AS id, `ville_population_2010` , `nom_departement`, `ville_nom_reel` AS ville, `ville_longitude_deg` AS longitude, `ville_latitude_deg` AS latitude');
		$sql .= parent::FROM('`markers_villes`, `markers_departements`');
		$sql .= parent::WHERE('markers_departements.id_departement = markers_villes.ville_departement');
		
		if (!empty($populationStart)){
			$sql .= parent::WHEREAND('ville_population_2010 >= '.$populationStart);
			if (!empty($populationEnd)){
				$sql .= parent::WHEREAND('ville_population_2010 < '.$populationEnd);
			}
		} else {
			$sql .= parent::WHEREAND('ville_population_2010 > 50000');
		}
		
		if (!empty($departement)){
			$sql .= parent::WHEREAND('markers_villes.ville_departement = '.$departement);
		}
		
		if (!empty($order)){
			$sql .= parent::ORDERBY( $order );
		} else {
			$sql .= parent::ORDERBY( 'ville_population_2010', 'ASC' );
		}
		
        $datas = $bdd->query($sql);
		
		return $datas; // Accès au résultat
    }
	
	
//__Compte le nombre de ville par rapport au nombre d'habitants demandé
//__Valeur d'entré : $populationStart, $populationEnd, et $departement
    function getCount( $populationStart = "", $populationEnd = "" , $departement = "") {
        $bdd = parent::getBdd();
		
		$sql = parent::SELECT('count(*)');
		$sql .= parent::FROM('`markers_villes`, `markers_departements`');
		$sql .= parent::WHERE('markers_departements.id_departement = markers_villes.ville_departement');
		
		if (!empty($populationStart)){
			$sql .= parent::WHEREAND('ville_population_2010 > '.$populationStart);
			if (!empty($populationEnd)){
				$sql .= parent::WHEREAND('ville_population_2010 < '.$populationEnd);
			}
		} else {
			$sql .= parent::WHEREAND('ville_population_2010 > 50000');
		}
		
		if (!empty($departement)){
			$sql .= parent::WHEREAND('markers_villes.ville_departement = '.$departement);
		}
			
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch()) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
    }
}