<?php 
require_once "./paths.php";
require_once $path['config.php'];
require_once "header.php";

$listings = $database->getAllListings();
?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">LISTINGS</div></h2>
	</div>
</div>

<span id="start-of-content"></span>

<div class="container-fluid grey-back">
	<div class="container">

		<?php

		foreach($listings as $listing) {
			$listing->render();
		}

		?>

	</div>
</div>

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/egpimaging_550South2nd_002_HIGHRES.jpg'});
</script>
