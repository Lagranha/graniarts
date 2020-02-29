<?php
	$main_content .= '
	<div class="container">    
	  	<div class="row">
		  	<div id="CarouselSlide" class="carousel slide" data-ride="carousel">
		  	<!-- Indicators -->
		  	<ol class="carousel-indicators">
		  		<li data-target="#CarouselSlide" data-slide-to="0" class="active"></li>
		  		<li data-target="#CarouselSlide" data-slide-to="1"></li>
		  	</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="images/portfolio/1.jpg" alt="1" style="width:100%;">
				</div>
				<div class="item">
			        <img src="images/portfolio/2.jpg" alt="2" style="width:100%;">
			    </div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#CarouselSlide" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#CarouselSlide" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	  	<div class="row">
	    	<div class="col-sm-4">
	      		<div class="panel"><img src="images/projects/1.jpg" class="img-responsive img-zoom" style="width:100%"></div>
	    	</div>
	    	<div class="col-sm-4">
	      		<div class="panel"><img src="images/projects/2.jpg" class="img-responsive img-zoom" style="width:100%"></div>
	    	</div>
	    	<div class="col-sm-4">
	      		<div class="panel"><img src="images/projects/3.jpg" class="img-responsive img-zoom" style="width:100%"></div>
	    	</div>
	  	</div>
	</div>';
?>