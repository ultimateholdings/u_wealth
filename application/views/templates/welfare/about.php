<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo config_item('company_name') ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/welfare/css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url('/') ?>">Welfare</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item "><a href="<?php echo base_url('site/App/welfare/index') ?>" class="nav-link">Home</a></li>
          <li class="nav-item active"><a href="<?php echo site_url('site/App/welfare/about')?>" class="nav-link">About</a></li>
          <!--<li class="nav-item"><a href="<?php echo site_url('site/causes')?>" class="nav-link">Causes</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/donate')?>" class="nav-link">Donate</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/blog')?>" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/gallery')?>" class="nav-link">Gallery</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/events')?>" class="nav-link">Events</a></li>-->
          <li class="nav-item"><a href="<?php echo site_url('site/App/welfare/contact')?>" class="nav-link">Contact</a></li>
          <li class="nav-item"><a target="_blank" href="<?php echo site_url('site/register')?>" class="nav-link">Donate</a></li>
          <li class="nav-item"><a target="_blank" href="<?php echo site_url('site/login')?>" class="nav-link">Member Login</a> </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url(<?php echo base_url();?>axxets/templates/welfare/images/bg_7.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo base_url('site/App/welfare/index') ?>">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex ftco-animate">
    				<div class="img img-about align-self-stretch" style="background-image: url(<?php echo base_url();?>axxets/templates/welfare/images/bg_3.jpg); width: 100%;"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 ftco-animate">
    				<h2 class="mb-4">Welcome to Welfare Stablished Since 1898</h2>
    				<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
    				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-intro ftco-intro-2" id="section-counter">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-1 align-items-stretch">
              <div class="text">
              	<span>Served Over</span>
                <strong class="number" data-number="1432805">0</strong>
                <span>Children in 190 countries in the world</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-2 align-items-stretch">
              <div class="text">
              	<h3 class="mb-4">Donate Money</h3>
              	<p>Even the all-powerful Pointing has no control about the blind texts.</p>
              	<p><a href="#" class="btn btn-white px-3 py-2 mt-2">Donate Now</a></p>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-3 align-items-stretch">
              <div class="text">
              	<h3 class="mb-4">Be a Volunteer</h3>
              	<p>Even the all-powerful Pointing has no control about the blind texts.</p>
              	<p><a href="#" class="btn btn-white px-3 py-2 mt-2">Be A Volunteer</a></p>
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Latest Donations</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(<?php echo base_url();?>axxets/templates/welfare/images/person_1.jpg)"></div>
        				<div class="info ml-4">
        					<h3><a href="#">Ivan Jacobson</a></h3>
        					<span class="position">Donated Just now</span>
        					<div class="text">
		        				<p>Donated <span>$300</span> for <a href="#">Children Needs Food</a></p>
		        			</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(<?php echo base_url();?>axxets/templates/welfare/images/person_2.jpg)"></div>
        				<div class="info ml-4">
        					<h3><a href="#">Ivan Jacobson</a></h3>
        					<span class="position">Donated Just now</span>
        					<div class="text">
		        				<p>Donated <span>$150</span> for <a href="#">Children Needs Food</a></p>
		        			</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(<?php echo base_url();?>axxets/templates/welfare/images/person_3.jpg)"></div>
        				<div class="info ml-4">
        					<h3><a href="#">Ivan Jacobson</a></h3>
        					<span class="position">Donated Just now</span>
        					<div class="text">
		        				<p>Donated <span>$250</span> for <a href="#">Children Needs Food</a></p>
		        			</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
      </div>
    </section>
		

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?php echo base_url();?>axxets/templates/welfare/images/image_1.jpg)"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?php echo base_url();?>axxets/templates/welfare/images/image_2.jpg)"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Site Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('site/App/welfare/index') ?>" class="py-2 d-block">Home</a></li>
                <li><a href="<?php echo site_url('site/App/welfare/about')?>" class="py-2 d-block">About</a></li>
                <li><a href="<?php echo site_url('site/App/welfare/contact')?>" class="py-2 d-block">Contact</a></li>
                <li><a href="<?php echo site_url('site/register')?>" class="py-2 d-block">Donate</a></li>
                <li><a href="<?php echo site_url('site/login')?>" class="py-2 d-block">Login</a></li>
                <!--<li><a href="<?php echo site_url('site/causes')?>" class="py-2 d-block">Causes</a></li>
                <li><a href="<?php echo site_url('site/events')?>" class="py-2 d-block">Event</a></li>
                <li><a href="<?php echo site_url('site/blog')?>" class="py-2 d-block">Blog</a></li>-->
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
                    <div class="col-md-12 text-center">
            <p>
            <?php if(config_item('footer_name') != '') { ?>
                    &copy; <?php echo date('Y') ?> All Rights Reserved by 
                <?php echo config_item('footer_name') ?>
                <?php } else { ?>
                &copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?>
                <?php } ?>
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo base_url();?>axxets/templates/welfare/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/aos.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/google-map.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/welfare/js/main.js"></script>

    
  </body>
</html>