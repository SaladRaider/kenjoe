<?php 
require_once "header.php";
?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/iStock_000014940140Large.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">ADMIN</div></h2>
	</div>
</div>

<span id="start-of-content"></span>
<form action="./post/sign-in.php" method="post" accept-charset="utf-8" >

	<div class="container-fluid">
		<div class="container">
			<h2>SIGN IN</h2>
			<?php 
			if(!empty($_GET['er']) && $_GET['er'] == '1') {
				echo "<p>Wrong Password</p>";
			}
			?>
			<form action="./post/sign-in.php" method="post" accept-charset="utf-8">
				<input class="text-box-outline col-xs-12 col-sm-12" type="password" name="password" placeholder="Password" />
				<input type="submit" name="" value="Sign In" />
			</form>
		</div>
	</div>
</form>

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/egpimaging_550South2nd_002_HIGHRES.jpg'});
</script>
