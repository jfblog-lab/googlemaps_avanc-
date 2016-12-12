<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
				<form action="markersUpdate.php?id=<?php echo $info->marker_id;?>" method="post">
					<div class="form-group">
						<label for="inputVille">Ville : </label>
						<input type="text" class="form-control col-md-2" id="inputVille" name="ville" placeholder="Ville" value="<?php echo nl2br(stripslashes($info->marker_ville)); ?>" />
					</div>
					
					<div class="form-group">
						<label for="inputActif">Actif : </label>
						<select class="form-control" name="actif">
						  <option <?php if("Oui" == $info->marker_actif) : ?>selected<?php endif; ?> value="Oui">Oui</option>
						  <option <?php if("Non" == $info->marker_actif) : ?>selected<?php endif; ?> value="Non">Non</option>
						</select>
					</div>
					
					<div class="form-group">
						<label for="inputCategory">Catégorie : </label>
						<select class="form-control" name="category">
							<?php foreach($categories as $category): ?>
							  <option <?php if($category->icone_id == $info->marker_categorie) : ?>selected<?php endif; ?> value="<?php echo $category->icone_id ?>"><?php echo $category->icone_categorie ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="inputLongitude">Longitude : </label>
						<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude" value="<?php echo nl2br(stripslashes($info->marker_longitude)); ?>" />
					</div>
					
					<div class="form-group">
						<label for="inputLatitude">Latitude : </label>
						<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="Latitude" value="<?php echo nl2br(stripslashes($info->marker_latitude)); ?>" />
					</div>
					
					<div class="form-group">
						<label for="inputDescription">Description</label>
						<textarea type="text" rows="7" class="form-control" id="inputDescription" name="description" placeholder="Description"><?php echo nl2br(stripslashes($info->marker_text));?></textarea>
					</div>
					
					<div class="form-group">
						<input type="submit" value="Mise à jour" />
					</div>
				</form>
				</div>
			</div>
		</div>
	</body>
</html>