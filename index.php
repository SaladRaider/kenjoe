
<?php include("header.php"); ?>

<div class="container-fluid header-image" data-parallax="scroll" data-image="images/main-slide.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">MISSSION STATEMENT</div></h2>
		<div class="text-centered">
			<a class="scroll-down" onclick="$('#start-of-content').goTo();">
				<span class="wow bounce animate-infinite fa fa-angle-double-down" data-wow-offset="-200"></span>
			</a>
		</div>
	</div>
</div>

<span id="start-of-content"></span>

<div class="container-fluid">
	<div class="container">
		<div class="col-sm-4 vert-padding">
			<div class="l-text text-centered wow fadeInUp">
				<span class="fa fa-universal-access"></span>
				<h3>Services</h3>
			</div>
			<p class="wow fadeInUp">
				CPAC also counsels our patients with every medication we dispense to ensure maximum compliance, and monitors medication combinations to protect against unsafe drug interactions.  Best of all, our prices are competitive - most are covered by private insurance, Medicare or Medicaid - so we can win and maintain your business! 
			</p>
			<div class="text-centered wow fadeInUp">
				<a href="./services.php" class="btn-flat-purple">Explore Services</a>
			</div>
		</div>
		<div class="col-sm-4 vert-padding">
			<div class="l-text text-centered wow fadeInUp">
				<span class="fa fa-map-o"></span>
				<h3>Locations</h3>
			</div>
			<p class="wow fadeInUp animation-delay-1">
				Located just east of Los Angeles near Pasadena and San Marino area, CPAC offers a safe and easy alternative for patients needing customized medications. Our highly educated and experienced staff can meet any special request to ensure that you get the proper dose in the best formulation to comply with your physicians's instructions.
			</p>
			<div class="text-centered wow fadeInUp animation-delay-1">
				<a href="./contact.php" class="btn-flat-purple">Find Location</a>
			</div>
		</div>
		<div class="col-sm-4 vert-padding">
			<div class="l-text text-centered wow fadeInUp animation-delay-2" >
				<span class="fa fa-refresh"></span>
				<h3>Refills</h3>
			</div>
			<p class="wow fadeInUp animation-delay-2">
				The prescriptions we provide are of the highest medical grade, and we stand 100% behind every prescription we fill.  Our goal is to earn your long-term trust; if a prescription does not meet your standards, we will re-make it for you at no additional cost until you are completely satisfied.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br/>
				<br/>
			</p>
			<div class="text-centered wow fadeInUp animation-delay-2">
				<a href="./refills.php" class="btn-flat-purple">Refill Now</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid no-padding">
	
	<div class="col-md-6 h-padding v-padding table-display about-section grey-back">
		<div class="centered">
			<h3 class="wow fadeInUp">About Us</h3>
			<p class="wow fadeInUp">
				If you are searching for a customized medication that most U.S. pharmacies can't provide, there may be a simple solution.  Compounding pharmacies mix drugs individually for patients that need, say, a smaller dose, different formulation, or different delivery mechanism than what is available at ordinary retail pharmacies.  If you are allergic to a common medication ingredient - such as gluten - cannot swallow pills due to a disability, or need to make a drug more palatable for a child or pet, Compounding Pharmacy Associates and Consultants (CPAC) might be your answer.
			</p>
			<div class="text-centered wow fadeInUp">
				<a href="./about.php" class="btn-flat-purple">Learn More</a>
			</div>
		</div>
	</div>
	<div class="col-md-6 no-padding image cell-centered about-section" id="dr-berry">
	</div>
</div>

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

<?php include("footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image').parallax({
		imageSrc: 'images/main-slide.jpg'
	});

	$('#dr-berry').parallax({
		imageSrc: './images/pharmacy-pharmacist_100456.jpg',
		speed: 0.8
	});
</script>
