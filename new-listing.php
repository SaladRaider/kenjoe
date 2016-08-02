
<?php include("./header.php"); ?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">NEW LISTING</div></h2>
	</div>
</div>

<span id="start-of-content"></span>


<div class="container-fluid">
	<div class="container">
		<h2>NEW LISTING</h2>
		<form action="./post/insert-listing.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="listing[realtor]" placeholder="Realtor" />
		<input type="file" name="listing_photo" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="listing[address]" placeholder="Address" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[price]" placeholder="Price" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[est_mortgage]" placeholder="Estimated Monthly Mortgage" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[beds]" placeholder="# of beds" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[baths]" placeholder="# of baths" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="number" name="listing[sq_ft]" placeholder="Square feet" />
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="listing[description]" placeholder="Description"></textarea>
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="listing[facts]" placeholder="Facts"></textarea>
		<input type="submit" value="Create" class="btn-flat-black-inv col-xs-12 wow fadeInUp btn-save" />
		</form>
	</div>
</div>
<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/egpimaging_550South2nd_002_HIGHRES.jpg'});
</script>
