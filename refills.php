
<?php include("./header.php"); ?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">REFILLS</div></h2>
	</div>
</div>

<span id="start-of-content"></span>

<div class="container-fluid">
	<div class="container">
		<h3 class="wow fadeInUp">Refill</h3>
		<div class="btn-group-standard wow fadeInUp">
			<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="name" placeholder="First Name" />
			<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="email" placeholder="Last Name" />
		</div>
		<input class="text-box-outline col-xs-12 wow fadeInUp" type="text" name="email" placeholder="Email Address" />
		<input class="text-box-outline col-xs-12 wow fadeInUp" type="text" name="email" placeholder="Telephone #" />
		<input class="text-box-outline col-xs-12 wow fadeInUp" type="text" name="email" placeholder="Prescription #" />
		<input class="text-box-outline col-xs-12 wow fadeInUp" type="text" name="email" placeholder="Additional Prescription #" />
		<input class="text-box-outline col-xs-12 wow fadeInUp" type="text" name="email" placeholder="Additional Prescription #" />
		<select class="text-box-outline col-xs-12 wow fadeInUp" type="text" name="email" placeholder="Delivery Options">
			<option value="">Pick up at pharmacy</option>
			<option value="">Local delivery</option>
			<option value="">USPS Priority mail</option>
			<option value="">UPS</option>
			<option value="">FedEx</option>
		</select>
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="message" placeholder="Special Instructions"></textarea>
		<a class="btn-flat-inv col-xs-12 wow fadeInUp">Send Request</a>
	</div>
</div>

<!-- key=AIzaSyCeBk4xBE0c5MFmev8nkrXmAm2icJ8d7gs& -->

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/iStock_000014940140Large.jpg'});
</script>
