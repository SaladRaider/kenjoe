
<?php include("header.php"); ?>

<div id="video-back" ></div>

<div class="container-fluid header-image" data-parallax="scroll" data-image="images/main-slide.jpg">
	<div class="container centered banner-text">
		<h2>
			<div class="xxl-text-prop row text-centered">
				KEN JOE, ARCADIA
				<div class="text-centered wow fadeInUp animation-delay-2 btn-contained v-padding">
					<a onclick="$('#start-of-content').goTo();" class="btn-flat-black-wh">EXPLORE</a>
				</div>
			</div>
		</h2>
	</div>
</div>

<span id="start-of-content"></span>

<div id="about" class="container-fluid no-padding">
	
	<div class="col-md-4 no-padding image cell-centered about-section" id="dr-berry">
	</div>
	<div class="col-md-8 h-padding v-padding table-display about-section">
		<div class="centered">
			<h2 class="wow fadeInUp">ABOUT</h2>
			<p class="wow fadeInUp">
				If you are searching for a customized medication that most U.S. pharmacies can't provide, there may be a simple solution.  Compounding pharmacies mix drugs individually for patients that need, say, a smaller dose, different formulation, or different delivery mechanism than what is available at ordinary retail pharmacies.  If you are allergic to a common medication ingredient - such as gluten - cannot swallow pills due to a disability, or need to make a drug more palatable for a child or pet, Compounding Pharmacy Associates and Consultants (CPAC) might be your answer.
			</p>
		</div>
	</div>
</div>

<div class="container-fluid grey-back">
	<div class="container">
		<div class="col-xs-12 col-sm-6 col-md-4 v-padding">
			<a href="./listing.php">
			<div class="house-card">
				<div class="house-img image" style="background-image: url('./images/Gingerbread_House_Essex_CT.jpg');" ></div>
				<div class="house-desc h-padding-sm v-padding-sm">
					<p>
						<div class="price-text">$500,000</div>
						3bds, 2 ba, 2,683 sqft<br />
						537 Cloverleaf Dr, Monrovia, CA
					</p>
				</div>
			</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 v-padding">
			<a href="./listing.php">
			<div class="house-card">
				<div class="house-img image" style="background-image: url('./images/Gingerbread_House_Essex_CT.jpg');" ></div>
				<div class="house-desc h-padding-sm v-padding-sm">
					<p>
						<div class="price-text">$500,000</div>
						3bds, 2 ba, 2,683 sqft<br />
						537 Cloverleaf Dr, Monrovia, CA
					</p>
				</div>
			</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 v-padding">
			<a href="./listing.php">
			<div class="house-card">
				<div class="house-img image" style="background-image: url('./images/Gingerbread_House_Essex_CT.jpg');" ></div>
				<div class="house-desc h-padding-sm v-padding-sm">
					<p>
						<div class="price-text">$500,000</div>
						3bds, 2 ba, 2,683 sqft<br />
						537 Cloverleaf Dr, Monrovia, CA
					</p>
				</div>
			</div>
			</a>
		</div>

		<div class="col-xs-12 v-padding v-padding-bottom-sm">
			<div class="text-centered wow fadeInUp animation-delay-2 btn-contained">
				<a href="./listings.php" class="btn-flat-black">VIEW MORE</a>
			</div>
		</div>
	</div>
</div>


<div id="contact" class="container-fluid">
	<div class="container">
		<div class="col-sm-4">
			<h2 class="wow fadeInUp">CONTACT</h2>
			<p>
				M: (626) 975-5108<br />
				O: (626) 386-7888<br />
				F: (626) 386-7800<br />
				kenjoe@kw.com
			</p>
		</div>
		<div class="col-sm-8">

			<div class="btn-group-standard wow fadeInUp">
				<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="name" placeholder="Name" />
				<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="email" placeholder="Email" />
			</div>
			<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="message" placeholder="Message"></textarea>
			<a class="btn-flat-black-inv col-xs-12 wow fadeInUp">Send Message</a>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	/*$('.header-image').parallax({
		imageSrc: 'images/main-slide.jpg'
	});*/

	$('#dr-berry').parallax({
		imageSrc: './images/Main-Line-Business-Headshot-Photographer1.jpg',
		speed: 0.8
	});

	$('#video-back').YTPlayer({
	    fitToBackground: true,
	    videoId: 'QKx2t-7vdqs',
	    repeat: true,
	    fitContainer: false
	});
</script>
