<?php 
require_once "./paths.php";
require_once $path['config.php'];
session_start();
Password::ifNotSignedInGoTo("./sign-in.php");
require_once("./admin-header.php"); 
?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">ADMIN</div></h2>
	</div>
</div>

<span id="start-of-content"></span>
<form action="./post/write-content.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">

<div class="container-fluid">
	<div class="container">
		<h2>OTHER</h2>
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="center-screen-text" placeholder="Center screen text" value="<?php echo file_get_contents("./txt/center-screen-text.txt"); ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="footer-text" placeholder="Footer text" value="<?php echo file_get_contents("./txt/footer-text.txt"); ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="contact-form-email" placeholder="Contact form email" value="<?php echo file_get_contents("./txt/contact-form-email.txt"); ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="interested-form-email" placeholder="Interested form email" value="<?php echo file_get_contents("./txt/intersted-form-email.txt"); ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="facebook-page-link" placeholder="Facebook page link" value="<?php echo file_get_contents("./txt/facebook-page-link.txt"); ?>" />
		<input class="text-box-outline col-xs-12 col-sm-12" type="text" name="linkedin-page-link" placeholder="Linkedin page link" value="<?php echo file_get_contents("./txt/linkedin-page-link.txt"); ?>" />
		<input type="submit" value="Save Changes" class="btn-flat-black-inv col-xs-12 wow fadeInUp btn-save" />
	</div>

<hr>

	<div class="container">
		<h2>ABOUT</h2>
		<p>Profile Photo: (Only jpeg, jpg, png or gif allowed) (5MB max)</p>
		<img class="img-responsive" style="max-height: 200px;" src="<?php echo file_get_contents("./txt/profile-photo.txt"); ?>"></img>
		<input class="text-box-outline col-xs-12" type="file" name="profile-photo" placeholder="About photo" value="<?php echo file_get_contents("./txt/profile-photo.txt"); ?>" />
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="about-content" placeholder="About Content"><?php echo file_get_contents("./txt/about-content.txt"); ?></textarea>
		<input type="submit" value="Save Changes" class="btn-flat-black-inv col-xs-12 wow fadeInUp btn-save" />
	</div>

<hr>

	<div class="container">
		<h2>CONTACT</h2>
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="contact-content" placeholder="Contact Content"><?php echo file_get_contents("./txt/contact-content.txt"); ?></textarea>
		<input type="submit" value="Save Changes" class="btn-flat-black-inv col-xs-12 wow fadeInUp btn-save" />
	</div>
</div>
</form>

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/egpimaging_550South2nd_002_HIGHRES.jpg'});
</script>
