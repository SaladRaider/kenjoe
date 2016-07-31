<div class="container-fluid dark-grey-back">
	<div class="container footer-container">
		<div class="col-xs-8 text-left-aligned">
			<?php echo file_get_contents("./txt/footer-text.txt"); ?>
		</div>
		<div class="col-xs-4 text-right-aligned font-md">
			<a href="<?php echo file_get_contents("./txt/facebook-page-link.txt"); ?>" target="_blank"><span class="fa fa-facebook-official" ></span></a> <a href="<?php echo file_get_contents("./txt/linkedin-page-link.txt"); ?>" target="_blank" ><span class="fa fa-linkedin-square"></span></a>
		</div>
	</div>
</div>

<script src="js/jquery-2.0.0.min.js" type="text/javascript"r></script>
<script src="js/parallax.min.js" type="text/javascript"r></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scrollTo.js"></script>
<script src="js/wow.js"></script>
<script src="js/youtubebackground.js"></script>
<script src="js/dropzone.js"></script>

<script>

	$(document).ready(function() {
		updateNavbar();

		wow = new WOW(
		{
		    boxClass:     'wow',      // default
		    animateClass: 'animated', // default
		    offset:       50,          // default
		    mobile:       true,       // default
		    live:         true        // default
		});
		wow.init();
	});

	$(window).scroll(function() {    
		updateNavbar();
	});

	$(window).resize(function() {  
		updateNavbar();
	});

	function updateNavbar() {
		var scroll = $(window).scrollTop();
		var width = $(window).width();

		if (scroll >= 200 || width <= 950) {
			if(!$(".navbar").hasClass("navbar-light"))
				$(".navbar").addClass("navbar-light");
		} else {
			if($(".navbar").hasClass("navbar-light"))
				$(".navbar").removeClass("navbar-light");
		}

		if(width > 767) {
			if($("#main-nav").hasClass("in"))
				$("#main-nav").removeClass("in");
		}
	}

	
</script>

</body>
</html>