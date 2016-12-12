<?php
/*
 * Modele de classe PHP : Map-2.php
 * Classe d'affichage des markers sur une Google Maps
 */

class Map extends BDD{
//__variable lié à la classe

//__Affiche tous les points actifs sur une Google Maps
    function getAllMarkersActif($markerActif = "Oui", $iconeActif = "Oui" ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT * ";
		$sql .= "FROM `markers` as MK, `markers_icone` as MKI ";
		$sql .= "WHERE MK.marker_categorie = MKI.icone_id ";
		$sql .= "AND `marker_actif` = '".$markerActif."' ";
		$sql .= "AND `icone_actif` = '".$iconeActif."' ";
		
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Affiche les points actifs selon la catégorie
    function getMarkersCategory($markerActif = "Oui", $iconeActif = "Oui", $category= "" ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT * ";
		$sql .= "FROM `markers` as MK, `markers_icone` as MKI ";
		$sql .= "WHERE MK.marker_categorie = MKI.icone_id ";
		$sql .= "AND `icone_categorie` = '".$category."'";
		$sql .= "AND `marker_actif` = 'Oui' ";
		$sql .= "AND `icone_actif` = 'Oui'";
		
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Affiche les informations pour les catégories
    function getAllCategory( ) {
        $bdd = parent::getBdd( );
		
		$sql = "SELECT * ";
		$sql .= "FROM `markers_icone` as MKI ";
		$sql .= "WHERE MKI.icone_actif = 'Oui' ";
		
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
}