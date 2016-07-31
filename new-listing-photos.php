
<?php 
require_once "./paths.php";
require_once $path['config.php'];
require_once "header.php";

$listing = $database->getListingById($_GET['listing_id']);
?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered"><?php echo $listing->getAddress(); ?> PHOTOS</div></h2>
	</div>
</div>

<span id="start-of-content"></span>

<div class="container-fluid">
	<div class="container">
		<h2>NEW PHOTOS</h2>
		<form action="./post/upload-listing-photo.php" class="col-xs-12 dropzone" id="listing-photo-dropzone" />
			<input type="hidden" name="listings_id" value="<?php echo $listing->getListingsId(); ?>" />
		</form>
		<form action="./post/upload-listing-photo.php" class="col-xs-12" method="post" accept-charset="utf-8" enctype="multipart/form-data" />
			<input type="hidden" name="listings_id" value="<?php echo $listing->getListingsId(); ?>" />
			<input type="file" name="listing_photo" />
			<input type="submit" name="submit" value="Upload" />
		</form>
	</div>
	<div class="container">
		<h2>CURRENT PHOTOS</h2>
	</div>
</div>
<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/egpimaging_550South2nd_002_HIGHRES.jpg'});

	Dropzone.options.listingPhotoDropzone = {
	  paramName: "listing_photo", // The name that will be used to transfer the file
	  maxFilesize: 2
	};
</script>
