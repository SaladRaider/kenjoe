<?php 
require_once "./paths.php";
require_once $path['config.php'];
require_once "header.php";

$listing = $database->getListingById($_GET['listing_id']);

?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="<?php echo $listing->getFeaturedListingPhotoPath($database); ?>">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered"><?php echo $listing->getAddress(); ?></div></h2>
	</div>
</div>

<span id="start-of-content"></span>

<div class="container-fluid no-padding">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<?php echo $listing->getListingPhotosAsHTML($database); ?>
		</div>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<div class="container-fluid grey-back">
	<div class="container">
		<div class="col-sm-6">
			<p>
				<h3>$<?php echo $listing->getPrice(); ?></h3>
				<?php echo $listing->getNumOfBeds(); ?> beds, <?php echo $listing->getNumOfBaths(); ?> baths, <?php echo $listing->getSqFt(); ?> sqft<br />
				<br />
				<?php echo $listing->getDescription(); ?>
			</p>
		</div>
		<div class="col-sm-6">
			<p>
				<h3>EST. MORTGAGE</h3>
				$<?php echo $listing->getEstimatedMortgage(); ?>/mo<br /><br />
				Facts
				<?php echo $listing->getFactsAsHTML(); ?>
			</p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<h3 class="wow fadeInUp">Interested?</h3>
		<div class="btn-group-standard wow fadeInUp">
			<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="name" placeholder="Full Name" />
			<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="email" placeholder="Email" />
		</div>
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="message" placeholder="Message"></textarea>
		<a class="btn-flat-dark-grey-inv col-xs-12 wow fadeInUp">I am interested</a>
	</div>
</div>

<!-- key=AIzaSyCeBk4xBE0c5MFmev8nkrXmAm2icJ8d7gs& -->

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: '<?php echo $listing->getFeaturedListingPhotoPath($database); ?>'});
</script>
