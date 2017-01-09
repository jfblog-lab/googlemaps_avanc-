<?php include_once("template/vueHeader.php"); ?>

  <body>

    <?php include_once("template/vueNavbar.php"); ?>

	<div id="map-canvas"></div>
	
	<div id="form">
		<form method="post" id="form" class="form-horizontal formMaps" role="form" action="maps.php">
			<h1>Formulaire</h1>
			<div class="form-group">
				<div class="col-sm-12 style">
					
				</div>
				<div class="col-sm-12 departement">
					Choisir votre département :<br />
					<select name="departement" size="8">
						<?php foreach ($departements as $departement): ?>
						 <option value="<?php echo $departement['id']; ?>"><?php echo $departement['departement']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-12 habitants">
					Choisir une tranche d'habitants :<br />
					<input type="radio" name="habitants" value="moins100" id="moins100" /> <label for="moins100">Inférieur ou égal à 100</label><br />
					<input type="radio" name="habitants" value="medium100-250" id="medium100-250" /> <label for="medium100-250">Entre 100 et 250</label><br />
					<input type="radio" name="habitants" value="medium250-500" id="medium250-500" /> <label for="medium250-500">Entre 250 et 500</label><br />
					<input type="radio" name="habitants" value="medium500-1000" id="medium500-1000" /> <label for="medium500-1000">Entre 500 et 1000</label><br />
					<input type="radio" name="habitants" value="medium1000-2500" id="medium1000-2500" /> <label for="medium1000-2500">Entre 1000 et 2500</label><br />
					<input type="radio" name="habitants" value="medium2500-5000" id="medium2500-5000" /> <label for="medium2500-5000">Entre 2500 et 5000</label><br />
					<input type="radio" name="habitants" value="medium5000-10000" id="medium5000-10000" /> <label for="medium5000-10000">Entre 5000 et 10000</label><br />
					<input type="radio" name="habitants" value="plus10000" id="plus10000" /> <label for="plus10000">Supérieur à 10000</label>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-11">
					<button type="submit" class="btn btn-default" id="submit">Envoyer</button>
				</div>
			</div>
		</form>
	</div>


	<?php include_once("template/vueFooter.php"); ?>