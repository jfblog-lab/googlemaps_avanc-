<?php include_once("template/vueHeader.php"); ?>

  <body>

    <?php include_once("template/vueNavbar.php"); ?>

    <div class="container">
      
      <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 main">
          <h1 class="page-header"><?php echo (!empty($titre)) ? $titre : ''; ?></h1>

          <h2 class="sub-header"><?php echo (!empty($description)) ? $description : ''; ?></h2>
          
          <p>L'outil proposé est une map qui propose la fonctionnalité "MarkerClusterer" de Google Maps</p>
          <p>La BDD comprend plus de 36000 points, chaque points étant une ville de France.</p>
          <br />
          <p>L'outil est en cours de création.</p>
        </div>
      </div>
    </div>

    </div><!-- /.container -->

	<?php include_once("template/vueFooter.php"); ?>