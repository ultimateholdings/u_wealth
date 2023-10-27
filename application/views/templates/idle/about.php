<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo config_item('company_name') ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <link href="<?php echo base_url();?>axxets/idle/about/images/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="<?php echo base_url();?>axxets/idle/about/css/css.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/about/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/about/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/about/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/about/css/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/about/css/lightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/about/css/style.css" rel="stylesheet">
</head>
<body>
 <!-- <?php $active='about';
  include_once('top/header.php'); ?>-->
  <button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
        <a href="https://idlemoney.in/web/index.php">
          <img src="<?php echo base_url();?>axxets/idle/about/images/logo.png" class="img img-responsive" style="max-height: 40px"></a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
          <li><a href="<?php echo site_url('site/custom/idle/index')?>">Home</a></li>
          <li class="menu-active"><a href="<?php echo site_url('site/custom/idle/about')?>">About Us</a></li>
          <li><a href="<?php echo site_url('site/custom/idle/contact')?>">Contact</a></li>
          <li><a target="_blank" href="<?php echo site_url('site/register')?>" class="nav-link" style="font-weight:bold; color:white;">Register</a></li>
          <li><a target="_blank" href="<?php echo site_url('site/login')?>" class="nav-link" style="font-weight:bold;color:white;">MEMBER LOGIN</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <section id="intro"  style="max-height: 300px">
    <div class="intro-container"  style="max-height: 300px">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel" style="max-height: 300px">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="carousel-background"><img src="<?php echo base_url();?>axxets/idle/images/1.jpg" ></div>
            <div class="carousel-container" style="max-height: 340px">
              <div class="section-header">
                <h3 style="color: #FFFFFF">About Us</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #intro -->
  <main id="main">
    <section id="about">
      <div class="container">
        <header class="section-header">
          <h3>About us</h3>
          <p><?php echo config_item('company_name').' ' ?>is a Global Donation funding program, where you can receive very fast money for your creative ideas or any other causes. Just Donate $30 one time from your pocket and earn up to $1,000,00.
          Ideal Money came first time in Global Market to provide 4 types of Auto pool Royalty Bonus in the Crowd funding History.</p>
        </header>
        <div class="row about-cols">
          <div class="col-md-12 wow fadeInUp">
            <div class="about-col"  style="border-radius: 8px">
              <div class="img">
                <img src="about-.jpg" alt="" class="img-fluid"  style="max-height: 100px; ">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Mission</a></h2>
              <p>
                Ideal Money helps the customers to take the financial freedom, to achieve their goal. We are helping the customers to pursue their financial goals. We aim to take the passion of marketing to the next level by developing and delivering supreme products where by people can earn excellent lively hood for themselves and their families.
              </p>
            </div>
          </div>
          <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
           <div class="about-col"  style="border-radius: 8px">
              <div class="img">
                <img src="about-.jpg" alt="" class="center" align="middle"  style="max-height: 100px;">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Plan</a></h2>
              <p>
                We are obliged to achieve a benchmark of – “Million to Millionares ". We are strong-minded towards making each of our the customers economically strong by guiding them in their progress for a better future, eventually helping to bring an optimistic change in the society. We ensure that our unique compensation plan will help our the customers to earn huge sums of money in a reasonable span of time. Our prime motto is “Committed to Deliver”.
              </p>
            </div>
          </div>
          <div class="col-md-12 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col"  style="border-radius: 8px">
              <div class="img">
                <img src="about-.jpg" alt="" class="img-fluid"  style="max-height: 100px; ">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Vision</a></h2>
              <p>
                Working with Ideal Money is like working with your own responsibilities & your team, where we walk hand in hand towards the path of growth and success. We are solely determined to offer 100% genuine projects to all over the customers so that they can fulfill their own enduring dreams effortlessly. With our dedicated efforts and expertise, we aspire to change the world’s perception towards Investment Plans.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #about -->
  </main>
<!--  <?php include_once('top/footer.php'); ?>-->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-info">
          <img src="<?php echo base_url();?>axxets/idle/about/images/logo.png" style="max-height: 80px; width: 80%">
          <br>
          <br>
          <p>IDEAL MONEY combines the best of crowdsourcing, bringing together various individuals who commit money to projects and companies they want to support. It’s a young and quickly growing market and it's transforming how people behave with their money. </p>
        </div>
        <div class="col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url("site/custom/idle/index");?>">Home</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('site/custom/idle/contact')?>">Contact Us</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('site/custom/idle/about')?>">About Us</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('site/custom/idle/terms'); ?>">Terms of service</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('site/custom/idle/privacy');?>">Privacy policy</a></li>    
          </ul>
        </div>   
        <div class=" col-md-3 footer-contact">
          <h4>Contact Us</h4>
          <p>
            Adam Street, New York, NY 535022 <br>
            <strong>Phone:</strong> +91 9898989898<br>
            <strong>Email:</strong> info@idlemoney.in<br>
          </p>
          <div class="social-links">
            <a href="https://idlemoney.in/web/about.php#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="https://idlemoney.in/web/about.php#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://idlemoney.in/web/about.php#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="https://idlemoney.in/web/about.php#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="https://idlemoney.in/web/about.php#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="co
  ntainer">
    <div class="copyright">
      <?php if(config_item('footer_name') != '') { ?>
                    &copy; <?php echo date('Y') ?> All Rights Reserved by 
                <?php echo config_item('footer_name') ?>
                <?php } else { ?>
                &copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?>
                <?php } ?>
    </div>
  </div>
</footer><!-- #footer -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<script src="<?php echo base_url();?>axxets/idle/about/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/jquery-migrate.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/easing.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/hoverIntent.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/superfish.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/wow.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/waypoints.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/counterup.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/lightbox.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/jquery.touchSwipe.min.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/contactform.js"></script>
<script src="<?php echo base_url();?>axxets/idle/about/js/main.js"></script>
</body>
</html>
