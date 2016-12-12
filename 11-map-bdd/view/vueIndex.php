<?php include_once("template/vueHeader.php"); ?>

  <body>

    <?php include_once("template/vueNavbar.php"); ?>
    
    <div id="map-canvas"></div>
    
    <div id="form">
    	<form method="post" id="form" class="form-horizontal formMaps" role="form" action="index.php">
    		<h1>Formulaire</h1>
    		<div class="form-group">
    			<div class="col-sm-12">
    				<?php foreach ($categories as $category) : ?>
						<div class="checkbox">
							<label>
								<input type="checkbox" value="<?php echo $category->icone_categorie ?>" name="marker[]" />
								<img src="<?php echo "common/images/marker-map/".$category->icone_icon.".png"; ?>" alt="marqueur <?php echo $category->icone_categorie ?>" />
								<?php echo $category->icone_categorie ?>
							</label>
						</div>
					<?php endforeach; ?>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="col-sm-offset-1 col-sm-11">
    				<button class="btn btn-default" type="submit" id="submit">Envoyer</button>
    			</div>
    		</div>
    	</form>
    </div>
    
    <script>
    	var marker = <?php echo $allMarkersJson ?>
    </script>

	<?php include_once("template/vueFooter.php"); ?>

	</body>
</html>