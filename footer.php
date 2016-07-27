<div class="container-fluid dark-grey-back">
	<div class="container">
		<div class="col-xs-8 text-left-aligned">
			kenjoe@kw.com | (626) 975-5108
		</div>
		<div class="col-xs-4 text-right-aligned">
			follow me: 
		</div>
	</div>
</div>

<!--
<div class="fixed-footer">
	<div style="float: left;"><p><span class="fa fa-phone"></span> +1 (626) 522-2735</p></div>
	<div class="centered-h hidden-xs">
		<p>3408 N. Eastern Ave., Los Angeles </p>
	</div>
	<div class="hidden-xs" style="float: right;"><a href="mailto:ordercpac@gmail.com"><p><span class="fa fa-paper-plane-o"></span> ordercpac@gmail.com</p></a></div>

</div>-->

<script src="js/jquery-2.0.0.min.js" type="text/javascript"r></script>
<script src="js/parallax.min.js" type="text/javascript"r></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scrollTo.js"></script>
<script src="js/wow.js"></script>
<script src="js/youtubebackground.js"></script>

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