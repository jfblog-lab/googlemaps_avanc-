<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php"; ?>
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
					<?php foreach ($infos as $info) : ?>
					<div class="todo">
						<span class="delete deleteMarkers" id="<?php echo $info->marker_id; ?>">
							<a href="markers.php?id=<?php echo $info->marker_id; ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $info->marker_id;?>">
							<a href="markersUpdate.php?id=<?php echo $info->marker_id;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($info->icone_categorie));?> - <?php echo nl2br(stripslashes($info->marker_ville)); ?></h4>
						<p class="description" id="<?php echo $info->marker_id;?>">
							Longitude : <?php echo nl2br(stripslashes($info->marker_longitude)); ?><br />
							Latitude : <?php echo nl2br(stripslashes($info->marker_latitude)); ?><br />
							Description : <?php echo nl2br(stripslashes($info->marker_text)); ?>
						</p>  
					</div>
					<?php endforeach; ?>
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter un marker</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="markers.php" method="post">
						<div class="form-group">
							<label for="inputVille">Ville : </label>
							<input type="text" class="form-control col-md-2" id="inputVille" name="ville" placeholder="Ville"/>
						</div>
						
						<div class="form-group">
							<label for="inputActif">Actif : </label>
							<select class="form-control" name="actif">
							  <option value="Oui">Oui</option>
							  <option value="Non">Non</option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="inputCategory">Catégorie : </label>
							<select class="form-control" name="category">
								<?php foreach($categories as $category): ?>
								  <option value="<?php echo $category->icone_id ?>"><?php echo $category->icone_categorie ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						
						<div class="form-group">
							<label for="inputLongitude">Longitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLongitude" name="longitude" placeholder="Longitude"/>
						</div>
						
						<div class="form-group">
							<label for="inputLatitude">Latitude : </label>
							<input type="text" class="form-control col-md-2" id="inputLatitude" name="latitude" placeholder="Latitude" />
						</div>
						
						<div class="form-group">
							<label for="inputDescription">Description</label>
							<textarea type="text" rows="7" class="form-control" id="inputDescription" name="description" placeholder="Description"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Ajouter" />
						</div>
					</form>
				</div>
			</div>
	    <?php require('template/vueFooter.php'); ?>
	    </div>
	</body>
</html>
