
<?php include("./header.php"); ?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">ABOUT US</div></h2>
	</div>
</div>

<span id="start-of-content"></span>

<div class="container-fluid no-padding">
	<div class="col-xs-12 grey-back text-centered v-padding">
		<h3 class="wow fadeInUp">Geneva Chen, PharmD PhD</h3>
	</div>
	<div class="col-md-6 h-padding v-padding table-display about-section">
		<div class="centered">
			<p class="wow fadeInUp">
				Compounding Pharmacy Associates and Consultants is owned and operated by Geneva Chen, Pharm.D, Ph.D.  Dr. Chen has had extensive training in pharmacy compounding and consulting, and has also worked as a research scientist and pharmacy college professor.  She is highly dedicated to her patients and practice, working closely with physicians and patients to achieve excellent results for each custom-made prescription.
			</p>
			
		</div>
	</div>
	<div class="col-md-6 no-padding image cell-centered about-section" id="dr-seus">
	</div>
	<div class="col-xs-12 v-padding h-padding">
		<p class="wow fadeInUp v-padding">Dr. Chen has won several awards, including the 2015 "Pharmacist of the Year," presented by the San Gabriel Valley Pharmacist Association.  Dr. Chen has also been invited to present her research to professional associations, such as the American Association for Cancer Research, and has published articles in such prestigious journals as Pharmaceutical Research and the American Journal of Pharmacy Educator and.  She currently sits on the board of directors of the San Gabriel Valley Pharmacist Association. </p>
		<p class="wow fadeInUp v-padding">Prior to opening her own compounding service, Dr. Chen was an assistant professor at the West Coast University School of Pharmacy and an instructor at the University of Houston College of Pharmacy.  She also spent five years as a pharmaceutical scientist at PCCA, the Professional Compounding Center of America, where she developed over 1,200 pharmaceutical formulations, and helped mentor other compounding pharmacists and technicians. In addition, Dr. Chen served as president of Irving Research Laboratories, where she developed and launched her own dermatologic product lines. </p> 
		<p class="wow fadeInUp v-padding">Dr. Chen earned a Ph.D. in Pharmaceutics and a Pharm.D. from the University of Houston College of Pharmacy.  She is bilingual in English and Chinese.</p>
	</div>
</div>

<div class="container-fluid no-padding">
	<div class="col-xs-12 grey-back text-centered v-padding">
		<h3 class="wow fadeInUp">(Another Dr.) You Can keep adding more if you want</h3>
	</div>
	<div class="col-sm-6 no-padding image cell-centered about-section" id="dr-berry">
	</div>
	<div class="col-sm-6 h-padding v-padding table-display about-section">
		<div class="centered">
			<p class="wow fadeInUp">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores sint sunt fugiat possimus, cumque voluptate incidunt harum odit accusamus deserunt, quisquam, ipsa ad. Placeat ipsam dicta atque molestias earum tempore! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.
			</p>
		</div>
	</div>
</div>

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/iStock_000014940140Large.jpg'});
	$('#dr-seus').parallax({
		imageSrc: './images/pharmacy-pharmacist_100456.jpg',
		speed: 0.8
	});
	$('#dr-berry').parallax({
		imageSrc: './images/pharmacy-pharmacist_100456.jpg',
		speed: 0.7
	});
</script>
