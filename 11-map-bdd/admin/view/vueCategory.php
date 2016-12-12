<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php"; ?>
				<div class="col-md-7 col-sm-7 col-sm-offset-2 markers">
					<?php foreach ($categories as $category) : ?>
					<div class="todo">
						<span class="delete deleteCat" id="<?php echo $category->icone_id; ?>">
							<a href="category.php?id=<?php echo $category->icone_id; ?>">
								<img src="common/img/supprimer.gif" alt="supprimer" />
							</a>
						</span>
						
						<span class="update" id="<?php echo $category->icone_id;?>">
							<a href="categoryUpdate.php?id=<?php echo $category->icone_id;?>">
								<img src="common/img/modifier.gif" alt="supprimer" />
							</a>
						</span>
						
						<h4 class="titre"><?php echo nl2br(stripslashes($category->icone_categorie));?></h4>
						<p class="description" id="<?php echo $category->icone_id;?>">
							<img src="../common/images/marker-map/<?php echo $category->icone_icon;?>.png" />
							<?php echo nl2br(stripslashes($category->icone_categorie));?>
							(Actif : <?php echo nl2br(stripslashes($category->icone_actif));?>)
						</p>  
					</div>
					<?php endforeach; ?>
				</div>
				
				<div class="col-md-3 col-sm-3 ajoutMarkers">
					<h4 id="ajout">
						<button type="button" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-plus">Ajouter une catégorie</span>
						</button>
					</h4>
					
					<form role="form" id="form" action="category.php" method="post">
						<div class="form-group">
							<label for="inputCategory">Catégorie : </label>
							<input type="text" class="form-control col-md-2" id="inputCategory" name="category" placeholder="Category"/>
						</div>
						
						<div class="form-group">
							<label for="inputActif">Actif : </label>
							<select class="form-control" name="actif">
							  <option value="Oui">Oui</option>
							  <option value="Non">Non</option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="inputImage">Image : </label>
							<input type="text" class="form-control col-md-2" id="inputImage" name="image" placeholder="Image"/>
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
