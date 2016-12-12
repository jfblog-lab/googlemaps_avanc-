<?php include("view/template/vueHeader.php"); // inclusion du header (meta, link, script, etc... ) ?>
	<body>

		<?php include("view/template/vueMenu.php"); // inclusion du menu principal ?>

		<div class="container-fluid">
			<div class="row">
				
				<?php include "view/template/vueSidebar.php"; ?>
				
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">Votre compte : <?php if ($_SESSION['login']) echo $_SESSION['login']; ?></h1>
					
					<h2 class="sub-header">Accueil</h2>
				</div>
			</div>
		</div>

<?php include ("view/template/vueFooter.php"); ?>