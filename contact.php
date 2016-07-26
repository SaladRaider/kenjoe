
<?php include("./header.php"); ?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">CONTACT US</div></h2>
	</div>
</div>

<span id="start-of-content"></span>

<div class="container-fluid">
	<div class="container">
		<h3 class="wow fadeInUp">Contact Us</h3>
		<div class="btn-group-standard wow fadeInUp">
			<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="name" placeholder="Name" />
			<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="email" placeholder="Email" />
		</div>
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="message" placeholder="Message"></textarea>
		<a class="btn-flat-inv col-xs-12 wow fadeInUp">Send Message</a>
	</div>
</div>

<div class="container-fluid no-padding">
	<div class="col-xs-12 text-centered v-padding grey-back">
		<h3>Med-Care Pharmacy</h3>
	</div>
	<div class="col-xs-4 text-centered table-display about-section">
		<div class="centered">
			<p class="non-indented">
				1048 S. Garfield Ave. 101<br />
				Alhambra, CA 91801
			</p>
		</div>
	</div>
	<div class="col-xs-8 no-padding overflow-hidden about-section">
		<iframe
		width="100%"
		height="500"
		frameborder="0" style="border:0"
		src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAotGTFWn_w9bNRQRX-nCWEbWAiDI_MD_Y&q=1048+S.+Garfield+Ave+101,Alhambra,+CA+91801" allowfullscreen>
		</iframe>
	</div>
</div>

<div class="container-fluid no-padding">
	<div class="col-xs-12 text-centered v-padding grey-back">
		<h3>Parole Pharmacy</h3>
	</div>
	<div class="col-xs-8 no-padding overflow-hidden about-section">
		<iframe
		width="100%"
		height="500"
		frameborder="0" style="border:0"
		src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAotGTFWn_w9bNRQRX-nCWEbWAiDI_MD_Y&q=3408+N.+Eastern+Ave,Los+Angeles,+CA+90032" allowfullscreen>
		</iframe>
	</div>
	<div class="col-xs-4 text-centered table-display about-section">
		<div class="centered">
			<p class="non-indented">
				3408 N. Eastern Ave<br />
				Los Angeles, CA 90032
			</p>
		</div>
	</div>
</div>

<!-- key=AIzaSyCeBk4xBE0c5MFmev8nkrXmAm2icJ8d7gs& -->

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/iStock_000014940140Large.jpg'});
</script>
