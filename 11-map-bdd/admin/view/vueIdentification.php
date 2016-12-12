<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include ("view/template/vueFooter.php"); ?>
		
		<div class="container">
				
				<form class="form-signin" role="form" name="identif" method="POST" action="login.inc.php">
		        	<h2 class="form-signin-heading">Page d'identification</h2>
		        	<p><?php if (!empty($message)) {echo $message;}  ?></p>
		      	
					<input type="text" class="form-control" name="login" placeholder="login" required autofocus>
					<input type="password" class="form-control" placeholder="Password" name="password" required>
					
					<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
					
					<p><a href="../index.php" target="_top">Revenir au front-office <span class="glyphicon glyphicon-arrow-right"></span></a></p>
		      </form>
		
		</div> <!-- /container -->
<?php include ("view/template/vueFooter.php"); ?>
