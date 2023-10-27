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

    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/welfare/css/style.css">
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
          <li class="nav-item "><a href="<?php echo base_url('/') ?>" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/about')?>" class="nav-link">About</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/causes')?>" class="nav-link">Causes</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/donate')?>" class="nav-link">Donate</a></li>
          <li class="nav-item active"><a href="<?php echo site_url('site/blog')?>" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/gallery')?>" class="nav-link">Gallery</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/events')?>" class="nav-link">Events</a></li>
          <li class="nav-item"><a href="<?php echo site_url('site/contact')?>" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/bg_2.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo base_url('/') ?>">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog</h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="<?php echo site_url('site/blog-single')?>" class="block-20" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/image_1.jpg);">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="<?php echo site_url('site/blog-single')?>" class="block-20" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/image_2.jpg)">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="<?php echo site_url('site/blog-single')?>" class="block-20" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/image_3.jpg)">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="<?php echo site_url('site/blog-single')?>" class="block-20" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/image_4.jpg)">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="<?php echo site_url('site/blog-single')?>" class="block-20" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/image_5.jpg);">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="<?php echo site_url('site/blog-single')?>" class="block-20" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/image_6.jpg);">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
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
                <a class="blog-img mr-4" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/image_1.jpg);"></a>
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
                <a class="blog-img mr-4" style="background-image: url(<?php echo base_url();?>axxets/welfare/images/image_2.jpg);"></a>
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
                <li><a href="<?php echo base_url('/') ?>" class="py-2 d-block">Home</a></li>
                <li><a href="<?php echo site_url('site/about')?>" class="py-2 d-block">About</a></li>
                <li><a href="<?php echo site_url('site/donate')?>" class="py-2 d-block">Donate</a></li>
                <li><a href="<?php echo site_url('site/causes')?>" class="py-2 d-block">Causes</a></li>
                <li><a href="<?php echo site_url('site/events')?>" class="py-2 d-block">Event</a></li>
                <li><a href="<?php echo site_url('site/blog')?>" class="py-2 d-block">Blog</a></li>
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
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <?php echo config_item('company_name') ?>
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="<?php echo base_url();?>axxets/welfare/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/aos.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/google-map.js"></script>
  <script src="<?php echo base_url();?>axxets/welfare/js/main.js"></script>
    
  </body>
</html>