
<?php include("./header.php"); ?>

<div class="container-fluid header-image-sm" data-parallax="scroll" data-image="./images/Gingerbread_House_Essex_CT.jpg">
	<div class="container centered banner-text">
		<h2><div class="xxl-text-prop row text-centered">537 Cloverleaf Dr,
Monrovia, CA 91016</div></h2>
	</div>
</div>

<span id="start-of-content"></span>

<div class="container-fluid no-padding">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="images/Gingerbread_House_Essex_CT.jpg" alt="Exterior" >
				<div class="carousel-caption">
		          <h3>Exterior</h3>
		          <p>Some description of th epicture.</p>
		        </div>
			</div>
			<div class="item">
				<img src="images/Gingerbread_House_Essex_CT.jpg" alt="Exterior">
				<div class="carousel-caption">
		          <h3>Exterior</h3>
		          <p>Some description of th epicture.</p>
		        </div>
			</div>
			<div class="item">
				<img src="images/Gingerbread_House_Essex_CT.jpg" alt="Exterior">
				<div class="carousel-caption">
		          <h3>Exterior</h3>
		          <p>Some description of th epicture.</p>
		        </div>
			</div>
			<div class="item">
				<img src="images/Gingerbread_House_Essex_CT.jpg" alt="Exterior">
				<div class="carousel-caption">
		          <h3>Exterior</h3>
		          <p>Some description of th epicture.</p>
		        </div>
			</div>
		</div>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<div class="container-fluid grey-back">
	<div class="container">
		<div class="col-sm-6">
			<p>
				<h3>$500,000</h3>
				3 beds, 2 baths, 2,683 sqft<br />
				<br />
				Approx 4.88 acres. This lush property is nestled in Cloverleaf Canyon. Very private and peaceful location, with stable, riding rings, and riding and hiking trails. There are a few flat pads on the property to build an estate or keep the same and rehab the current house on the property. The property also has a guest house with a storage structure. This property has many possibilities. Buyer to check with city.
			</p>
		</div>
		<div class="col-sm-6">
			<p>
			<h3>EST. MORTGAGE</h3>
			$7,017/mo<br /><br />
			Facts
				<ul>
				<li>Lot: 19.1 acres</li>
				<li>Multiple Occupancy</li>
				<li>Built in 1916</li>
				<li>225 days on Zillow</li>
				<li>Views since listing: 2,432</li>
				<li>All time views: 4,466</li>
				<li>10 shoppers saved this home</li>
				<li>Cooling: Central</li>
				<li>Heating: Other</li>
				<li>Last sold: Oct 2006 for $3,100,000</li>
				<li>Price/sqft: $745</li>
				<li>MLS #: AR16094647</li>
				</ul>
</p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<h3 class="wow fadeInUp">Interested?</h3>
		<div class="btn-group-standard wow fadeInUp">
			<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="name" placeholder="Full Name" />
			<input class="text-box-outline col-xs-12 col-sm-6" type="text" name="email" placeholder="Email" />
		</div>
		<textarea rows=5 class="text-area-outline col-xs-12 wow fadeInUp" name="message" placeholder="Message"></textarea>
		<a class="btn-flat-dark-grey-inv col-xs-12 wow fadeInUp">I am interested</a>
	</div>
</div>

<!-- key=AIzaSyCeBk4xBE0c5MFmev8nkrXmAm2icJ8d7gs& -->

<?php include("./footer.php"); ?>

<script>
	<!-- go here: http://pixelcog.github.io/parallax.js/ for info -->
	$('.header-image-sm').parallax({imageSrc: './images/Gingerbread_House_Essex_CT.jpg'});
</script>
