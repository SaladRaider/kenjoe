<?php 
require_once "./paths.php";
require_once $path['config.php'];
require_once "header.php";

$listing = $database->getListingById($_GET['listing_id']);
?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">NEW LISTING</div></h2>
	</div>
</div>

<span id="start-of-content"></span>


<div class="container-fluid">
	<div class="container">
		<h2>EDIT LISTING</h2>
		<form action="./post/update-listing.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="listing[listings_id]" value="<?php echo $listing->getListingsId() ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="listing[realtor]" placeholder="Realtor" value="<?php echo $listing->getRealtor() ?>" />
		<input type="file" name="listing_photo" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="listing[address]" placeholder="Address" value="<?php echo $listing->getAddress() ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[price]" placeholder="Price" value="<?php echo $listing->getPrice() ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[est_mortgage]" placeholder="Estimated Monthly Mortgage" value="<?php echo $listing->getEstimatedMortgage() ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[beds]" placeholder="# of beds" value="<?php echo $listing->getNumOfBeds() ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[baths]" placeholder="# of baths" value="<?php echo $listing->getNumOfBaths() ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[sq_ft]" placeholder="Square feet" value="<?php echo $listing->getSqFt() ?>" />
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="listing[description]" placeholder="Description"><?php echo $listing->getDescription() ?></textarea>
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="listing[facts]" placeholder="Facts"><?php echo $listing->getFacts() ?></textarea>
		<input type="submit" value="Save" class="btn-flat-black-inv col-xs-12 wow fadeInUp btn-save" />
		</form>
	</div>
</div>
<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/egpimaging_550South2nd_002_HIGHRES.jpg'});
</script>
