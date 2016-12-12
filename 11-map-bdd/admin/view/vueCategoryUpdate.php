<!DOCTYPE html>
<html>
	<?php require('template/vueHeader.php'); ?>

	<body>
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-3">
				<form action="categoryUpdate.php?id=<?php echo $info->icone_id;?>" method="post">
					
					<div class="form-group">
						<label for="inputCategory">Catégorie : </label>
						<select class="form-control" name="category">
							<?php foreach($categories as $category): ?>
							  <option <?php if($category->icone_id == $info->icone_id) : ?>selected<?php endif; ?> value="<?php echo $category->icone_categorie ?>"><?php echo $category->icone_categorie ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="inputActif">Actif : </label>
						<select class="form-control" name="actif">
						  <option <?php if("Oui" == $info->icone_actif) : ?>selected<?php endif; ?> value="Oui">Oui</option>
						  <option <?php if("Non" == $info->icone_actif) : ?>selected<?php endif; ?> value="Non">Non</option>
						</select>
					</div>
					
					<div class="form-group">
						<label for="inputImage">Image : </label>
						<input type="text" class="form-control col-md-2" id="inputImage" name="image" placeholder="Image" value="<?php echo nl2br(stripslashes($info->icone_icon)); ?>" />
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