<?php 
require_once "./paths.php";
require_once $path['config.php'];
require_once "header.php";

$listings = $database->getListingsLimitBy(3);
?>

<div id="video-back" ></div>

<div class="container-fluid header-image" data-parallax="scroll" data-image="images/main-slide.jpg">
	<div class="container centered banner-text">
		<h2>
			<div class="xxl-text-prop row text-centered">
				<?php echo file_get_contents("./txt/center-screen-text.txt"); ?>
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
				<?php echo nl2br(file_get_contents("./txt/about-content.txt")); ?>
			</p>
		</div>
	</div>
</div>

<div class="container-fluid grey-back">
	<div class="container">
		
		<?php
		foreach($listings as $listing) {
			$listing->render($database);
		}
		?>

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
				<?php echo nl2br(file_get_contents("./txt/contact-content.txt")); ?>
			</p>
		</div>
		<div class="col-sm-8">
			<form action="./post/send-contact-email.php" method="post" accept-charset="utf-8">
			<div class="btn-group-standard wow fadeInUp">
				<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="name" placeholder="Name" />
				<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="email" placeholder="Email" />
			</div>
			<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="message" placeholder="Message"></textarea>
			<input class="btn-flat-black-inv col-xs-12 wow fadeInUp" type="submit" value="Send Message" />
			</form>
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
		imageSrc: '<?php echo file_get_contents("./txt/profile-photo.txt"); ?>',
		speed: 0.8
	});

	$('#video-back').YTPlayer({
	    fitToBackground: true,
	    videoId: 'QKx2t-7vdqs',
	    repeat: true,
	    fitContainer: false
	});
</script>
