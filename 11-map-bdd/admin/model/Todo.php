<?php
/*
 * Modele de classe PHP : Map-2.php
 * Classe d'affichage des markers sur une Google Maps
 */

class Todo extends BDD{
//__variable lié à la classe

//__Affiche tous les infos de la to-do list
    function getInfos() {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM markers as MK,  markers_icone as MKI";
		$sql .= " WHERE MK.marker_id = MKI.icone_id";
		$sql .= " ORDER BY marker_id";
		
        $datas = $bdd->query($sql);
		
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Insertion d'une info dans la to-do list
    function getInsertInfo( $titre, $description ) {
        $bdd = parent::getBdd();
		
		$sql = "INSERT INTO todo (titre,description)";
		$sql .= " VALUES (:titre,:description)";
	
		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':titre', $titre);
		$stmt->bindParam(':description', $description);
		
		$stmt->execute();
    }
	
//Mise à jour d'une info quelconque de la to-do list
    function getUpdateInfo( $id, $titre, $description ) {
        $bdd = parent::getBdd();
		
		$sql = "UPDATE todo";
		$sql .= " SET titre=:titre, description=:description";
		$sql .= " WHERE id=:id";
	
		$stmt = $bdd->prepare($sql);
		
		$stmt->bindParam(':titre', $titre);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':id', $id);
		
		$stmt->execute();
    }
	
//__Suppression d'une info dans la to-do list
    function getIdInfo( $id ) {
        $bdd = parent::getBdd();
		
		$sql = "SELECT *";
		$sql .= " FROM todo";
		$sql .= " WHERE id=".$id;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
    }
	
//__Suppression d'une info dans la to-do list
    function getDeleteInfo( $id ) {
        $bdd = parent::getBdd();
		
		$sql = "DELETE FROM todo";
		$sql .= " WHERE id=".$id;
		
		$datas = $bdd->query($sql);
		
		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }
		
		return $count; // Accès au résultat
    }
}