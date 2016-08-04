
<?php 
require_once "./paths.php";
require_once $path['config.php'];
session_start();
Password::ifNotSignedInGoTo("./sign-in.php");
require_once "admin-header.php";

$listing = $database->getListingById($_GET['listing_id']);
$listingPhotos = $listing->getListingPhotos($database);
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
		<form action="./post/upload-listing-photo.php" class="col-xs-12 dropzone" id="listing-photo-dropzone" >
		<input type="hidden" name="listings_id" value="<?php echo $listing->getListingsId(); ?>" />
		</form>
	</div>
</div>
<div class="container-fluid no-padding">
	<div class="container">
		<h2>CURRENT PHOTOS</h2>
	</div>
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

	<div class="container">
		<form action="./post/delete-photos.php" method="post" accept-charset="utf-8">
		<input type="hidden" name="listing_id" value="<?php echo $listing->getListingsId() ?>" />
		<?php 
		foreach($listingPhotos as $listingPhoto) {
			echo "
			<div class=\"col-xs-12 col-sm-6 col-md-4\">
				<div class=\"col-xs-12 text-centered\"><input type=\"checkbox\" name=\"photosToDelete[]\" value=\"{$listingPhoto->getListingPhotosId()}\"></div>
				<img src=\"{$listingPhoto->getPhotoPath()}\" class=\"img-responsive\" style=\"max-height: 300px;\" />
			</div>
			";
		}
		?>
		<input type="submit" value="Delete Selected Photos" class="btn-flat-black-inv col-xs-12 wow fadeInUp btn-save" />
		</form>
	</div>
</div>

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: '<?php echo $listing->getFeaturedListingPhotoPath($database); ?>'});

	Dropzone.options.listingPhotoDropzone = {
	  paramName: "listing_photo", // The name that will be used to transfer the file
	  maxFilesize: 2
	};
</script>
