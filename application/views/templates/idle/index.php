<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo config_item('company_name') ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="<?php echo base_url();?>axxets/idle/images/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="<?php echo base_url();?>axxets/idle/css/css.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/css/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/css/lightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/css/style.css" rel="stylesheet">
</head>
<body>
 <!-- <?php 
$active='home';
  include_once('top/header.php'); ?>-->
  <button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
        <a href="index.php">
        <img src="<?php echo base_url();?>axxets/idle/images/logo.png" class="img img-responsive" style="max-height: 40px"></a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
          <li class=""><a href="<?php echo site_url('site/custom/idle/index')?>">Home</a></li>
          <li class=""><a href="<?php echo site_url('site/custom/idle/about')?>">About Us</a></li>
          <li><a href="<?php echo site_url('site/custom/idle/contact')?>">Contact</a></li>
          <li><a href="<?php echo site_url('site/register')?>" class="nav-link" style="font-weight:bold; color:white;">Register</a></li>
          <li><a target="_blank" href="<?php echo site_url('site/login')?>" class="nav-link" style="font-weight:bold;color:white;">MEMBER LOGIN</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section id="intro"  style="max-height: 650px">
    <div class="intro-container"  style="max-height: 650px">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel" style="max-height: 650px">
        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="carousel-background"><img src="<?php echo base_url();?>axxets/idle/images/1.jpg" ></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Welcome to Ideal Money</h2>
                <p>We make everyday financial operations simple and effective.
                Making Finance
                Simple.
                </p>
                <a target="_blank" href="<?php echo site_url('site/register')?>" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-background"><img src="<?php echo base_url();?>axxets/idle/images/2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Find it first on Ideal Money</h2>
                <p>Ideal Money is where early adopters and innovation seekers find lively, imaginative tech before it hits the mainstream.</p>
                <a href="about.php" class="btn-get-started scrollto">Know Us</a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-background"><img src="<?php echo base_url();?>axxets/idle/images/3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Your Growth Our Business</h2>
                <p>Sign up today and take your life to the next level.. Reach Heigher</p>
                <a href="contact.php" class="btn-get-started scrollto">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      <!--  <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>-->
      </div>
    </div>
  </section><!-- #intro -->
  <main id="main">
    <section id="featured-services">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 box">
            <i class="fa  fa-volume-up"></i>
            <h4 class="title"><a href="">RAISE AWARENESS</a></h4>
            <p class="description">Enable donors to find out if their employers will match their donations and how much money their employers will match. 
            </p>
          </div>
          <div class="col-lg-4 box box-bg">
            <i class="fa fa-cubes"></i>
            <h4 class="title"><a href="">SIMPLIFY MATCHING</a></h4>
            <p class="description">Provide access to matching gift forms, guidelines, and instructions for a donor to easily submit matching gifts.</p>
          </div>
          <div class="col-lg-4 box">
            <i class="fa fa-line-chart"></i>
            <h4 class="title"><a href="">GROW REVENUE</a></h4>
            <p class="description">Increase your matching gift revenue after implementing our tools into your existing fundraising efforts.</p>
          </div>
        </div>
      </div>
    </section><!-- #featured-services -->
    <section id="about">
      <div class="container">
        <header class="section-header">
          <h3>About Us</h3>
          <p><?php echo config_item('company_name').' ' ?> combines the best of crowdsourcing, bringing together various individuals who commit money to projects and companies they want to support. It’s a young and quickly growing market and it's transforming how people behave with their money.<br><br>
            Ideal Money is a Global Donation funding Program, Where you can receive very fast money for your creative ideas or any other causes. Just Donate $30 one time from your Pocket and earn up to $1,000,00.
          </p>
        </header>
        <div class="row about-cols">
          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url();?>axxets/idle/images/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Mission</a></h2>
              <p style="height: 260px">
                Ideal Money helps the customers to take the financial freedom, to achieve their goal. We are helping the customers to pursue their financial goals. We aim to take the passion of marketing to the next level by developing and delivering supreme products where by people can earn excellent lively hood for themselves and their families.
              </p>
            </div>
          </div>
          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url();?>axxets/idle/images/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Plan</a></h2>
              <p style="height: 260px">
                We are obliged to achieve a benchmark of – “Million to Millionares ". We are strong-minded towards making each of our the customers economically strong by guiding them in their progress for a better future, eventually helping to bring an optimistic change in the society. We ensure that our unique compensation plan will help our the customers to earn huge sums of money in a reasonable span of time. Our prime motto is “Committed to Deliver”.
              </p>
            </div>
          </div>
          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url();?>axxets/idle/images/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Vision</a></h2>
              <p style="height: 260px">
                Working with Ideal Money is like working with your own responsibilities & your team, where we walk hand in hand towards the path of growth and success. We are solely determined to offer 100% genuine projects to all over the customers so that they can fulfill their own enduring dreams effortlessly. With our dedicated efforts and expertise, we aspire to change the world’s perception towards Investment Plans.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #about -->
    <section id="about">
      <div class="container">
        <header class="section-header">
          <h3>Campaign Ideas</h3>
        </header>
        <div class="row">
          <div class="col-md-4 col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/idle/images/client-1.png" alt="1 slide"></div>
          <div class="col-md-4  col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/idle/images/client-2.png" alt="2 slide"></div>
          <div class="col-md-4  col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/idle/images/client-3.png" alt="3 slide"></div>
          <div class="col-md-4 col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/idle/images/client-4.png" alt="1 slide"></div>
          <div class="col-md-4  col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/idle/images/client-5.png" alt="2 slide"></div>
          <div class="col-md-4  col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/idle/images/client-6.png" alt="3 slide"></div>
        </div>       
      </div>
    </section>
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-left">
        <h3>KEY TAKEAWAYS</h3>
        <p><?php echo config_item('company_name').' ' ?> is a way to source money for a project by asking a large number of contributors to individually donate a small amount to it. In return, the backers may receive token rewards that increase in prestige as the size of the donation increases.</p>
        <p><i class='fa fa-check'></i>Ideal Money crowdfunding is a way of raising money by asking a large group of people to donate.</p>
        <p><i class='fa fa-check'></i>Donation levels can be set with associated perks or rewards.</p>
        <p><i class='fa fa-check'></i>Donation is different from loans or equity, in that there is no promise to repay or ownership stake.</p> 
      </div>
    </section><!-- #call-to-action -->
  </main>
 <!-- <?php include_once('top/footer.php'); ?>-->
 <footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-info">
          <img src="<?php echo base_url();?>axxets/idle/images/logo.png" style="max-height: 80px; width: 80%">
          <br>
          <br>
          <p>IDEAL MONEY combines the best of crowdsourcing, bringing 
          together various individuals who commit money to projects and companies 
          they want to support. It’s a young and quickly growing market and it's 
          transforming how people behave with their money. </p>
        </div>
        <div class="col-md-1 footer-links">
        </div>
        <div class="col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('site/custom/idle/contact') ?>">Contact Us</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('site/custom/idle/about'); ?>">About Us</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('site/custom/idle/terms'); ?>">Terms of service</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('site/custom/idle/privacy');?>">Privacy policy</a></li>
          </ul>
        </div>      
        <div class="col-md-1 footer-links">
        </div>
        <div class=" col-md-3 footer-contact">
          <h4>Contact Us</h4>
          <p>
            Adam Street, New York, NY 535022 <br>
            <strong>Phone:</strong> +91 9898989898<br>
            <strong>Email:</strong> info@idlemoney.in<br>
          </p>
          <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>
        </div>  
      </div>
    </div>
  </div>
  <div class="container">
    <div class="copyright">
      <?php if(config_item('footer_name') != '') { ?>
            &copy; <?php echo date('Y') ?> All Rights Reserved by 
        <?php echo config_item('footer_name') ?>
        <?php } else { ?>
        &copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?>
      <?php } ?>
    </div> 
  </div>
</footer>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<nav id="mobile-nav">
  <ul class="" style="touch-action: pan-y;" id="">
    <li class="menu-active"><a href="<?php echo site_url("site/custom/idle/index");?>">Home</a></li>
    <li><a href="<?php echo site_url('site/custom/idle/about') ?>">About Us</a></li>
    <li><a href="<?php echo site_url('site/custom/idle/contact') ?>">Contact</a></li>
    <li><a target="_blank" href="<?php echo site_url('site/register')?>" class="nav-link" style="font-weight:bold; color:white;">Register</a></li>
    <li><a target="_blank" href="<?php echo site_url('site/login')?>" class="nav-link" style="font-weight:bold;color:white;">MEMBER LOGIN</a></li>
  </ul>
</nav>
<div id="mobile-body-overly"></div>
  <div id="lightboxOverlay" class="lightboxOverlay" style="display: none;"></div>
    <div id="lightbox" class="lightbox" style="display: none;">
      <div class="lb-outerContainer">
        <div class="lb-container">
          <img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
          <div class="lb-nav">
            <a class="lb-prev" href=""></a>
            <a class="lb-next" href=""></a>
          </div>
          <div class="lb-loader">
            <a class="lb-cancel"></a>
          </div>
        </div>
      </div>
      <div class="lb-dataContainer">
        <div class="lb-data">
          <div class="lb-details">
            <span class="lb-caption"></span>
            <span class="lb-number"></span>
          </div>
          <div class="lb-closeContainer">
            <a class="lb-close"></a>
          </div>
        </div>
      </div>
    </div>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script src="<?php echo base_url();?>axxets/idle/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/easing.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/hoverIntent.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/superfish.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/wow.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/waypoints.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/counterup.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/lightbox.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/jquery.touchSwipe.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/contactform.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/js/main.js"></script>
</body>
</html>
