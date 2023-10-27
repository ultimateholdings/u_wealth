<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Idle Money</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="<?php echo base_url();?>axxets/template8/images/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="<?php echo base_url();?>axxets/template8/css/css.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/template8/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/template8/css/animate.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/template8/css/ionicons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/template8/css/owl.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/template8/css/lightbox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/template8/css/style.css" rel="stylesheet">
</head>
<body>
<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>
<header id="header">
  <div class="container-fluid">
    <div id="logo" class="pull-left">
      <a href="index.php">
      <img src="<?php echo base_url();?>axxets/template8/images/logo2.png" class="img img-responsive" style="max-height: 40px"></a>
    </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
        <li class="menu-active"><a href="https://idlemoney.in/web/index.php">Home</a></li>
        <li class=""><a href="<?php echo site_url('site/about')?>">About Us</a></li>
        <li><a href="<?php echo site_url('site/contact')?>"">Contact</a></li>
        <li><a target="_blank" href="<?php echo site_url('site/register')?>" class="nav-link" style="font-weight:bold; color:white;">Register</a></li>
        <li><a target="_blank" href="<?php echo site_url('site/login')?>" class="nav-link" style="font-weight:bold;color:white;">MEMBER LOGIN</a></li>
      </ul>
    </nav>
  </div>
</header>
<section id="intro" style="max-height: 650px">
  <div class="intro-container" style="max-height: 650px">
    <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel" style="max-height: 650px">
      <ol class="carousel-indicators">
        <li data-target="#introCarousel" data-slide-to="0" class=""></li>
        <li data-target="#introCarousel" data-slide-to="1" class=""></li>
        <li data-target="#introCarousel" data-slide-to="2" class="active"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item" style="background-image: url(axxets/template8/images/1.jpg);"> 
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Welcome to Idle Money</h2>
              <p>We make everyday financial operations simple and effective.
                Making Finance
                Simple.
              </p>
              <a target="_blank" href="<?php echo site_url('site/register')?>"><button class="btn btn-outline" style="background-color:none;color: white;border-color: white;border-width:2px;">Get Started</button></a>
            </div>
          </div>
        </div>
        <div class="carousel-item active carousel-item-left" style="background-image: url(axxets/template8/images/2.jpg);">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Find it first on Idle Money</h2>
              <p>Idle Money is where early adopters and innovation seekers find lively, imaginative tech before it hits the mainstream.</p>
              <a href="<?php echo site_url('site/about')?>" class="btn-get-started scrollto">Know Us</a>
            </div>
          </div>
        </div>
        <div class="carousel-item carousel-item-next carousel-item-left" style="background-image: url(axxets/template8/images/3.jpg);"> 
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Your Growth Our Business</h2>
              <p>Sign up today and take your life to the next level.. Reach Heigher</p>
              <a href="<?php echo site_url('site/contact')?>" class="btn-get-started scrollto">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
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
  </section>
  <section id="about">
    <div class="container">
      <header class="section-header">
        <h3>About Us</h3>
        <p><?php echo config_item('company_name').' ' ?> combines the best of crowdsourcing, bringing 
        together various individuals who commit money to projects and companies 
        they want to support. It’s a young and quickly growing market and it's 
        transforming how people behave with their money.<br><br>
        Idle Money is a Global Donation funding Program, Where you 
        can receive very fast money for your creative ideas or any other causes.
         Just Donate $40 one time from your Pocket and earn up to $1,000,00.
        </p>
      </header>
      <div class="row about-cols">
        <div class="col-md-4 wow fadeInUp" style="visibility: hidden; animation-name: none;">
          <div class="about-col">
            <div class="img">
              <img src="<?php echo base_url();?>axxets/template8/images/about-mission.jfif" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Our Mission</a></h2>
            <p style="height: 260px">
              Idle Money helps the customers to take the financial 
            freedom, to achieve their goal. We are helping the customers to pursue 
            their financial goals. We aim to take the passion of marketing to the 
            next level by developing and delivering supreme products where by people
             can earn excellent lively hood for themselves and their families.
            </p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
          <div class="about-col">
            <div class="img">
              <img src="<?php echo base_url();?>axxets/template8/images/about-plan.jfif" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-list-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Our Plan</a></h2>
            <p style="height: 260px">
              We are obliged to achieve a benchmark of – “Million to 
              Millionares ". We are strong-minded towards making each of our the 
              customers economically strong by guiding them in their progress for a 
              better future, eventually helping to bring an optimistic change in the 
              society. We ensure that our unique compensation plan will help our the 
              customers to earn huge sums of money in a reasonable span of time. Our 
              prime motto is “Committed to Deliver”.
            </p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
          <div class="about-col">
            <div class="img">
              <img src="<?php echo base_url();?>axxets/template8/images/about-vision.jfif" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-eye-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Our Vision</a></h2>
            <p style="height: 260px">
              Working with Idle Money is like working with your own 
              responsibilities &amp; your team, where we walk hand in hand towards the
              path of growth and success. We are solely determined to offer 100% 
              genuine projects to all over the customers so that they can fulfill 
              their own enduring dreams effortlessly. With our dedicated efforts and 
              expertise, we aspire to change the world’s perception towards Investment
              Plans.
            </p>
          </div>
        </div> 
      </div>
    </div>
  </section>
  <section id="about">
    <div class="container">
      <header class="section-header">
        <h3>Campaign Ideas</h3>
      </header>
      <div class="row">
        <div class="col-md-4 col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/template8/images/client-1.png" alt="1 slide"></div>
        <div class="col-md-4  col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/template8/images/client-2.png" alt="2 slide"></div>
        <div class="col-md-4  col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/template8/images/client-3.png" alt="3 slide"></div>
        <div class="col-md-4 col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/template8/images/client-4.png" alt="1 slide"></div>
        <div class="col-md-4  col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/template8/images/client-5.png" alt="2 slide"></div>
        <div class="col-md-4  col-xs-6"><img class="d-block w-100" src="<?php echo base_url();?>axxets/template8/images/client-6.png" alt="3 slide"></div>
      </div>         
    </div>
  </section>
  <section id="call-to-action" class="wow fadeIn" style="visibility: hidden; animation-name: none;">
    <div class="container text-left">
      <h3>KEY TAKEAWAYS</h3>
      <p>Idle Money is a way to source money for a project by asking a
      large number of contributors to individually donate a small amount to 
      it. In return, the backers may receive token rewards that increase in 
      prestige as the size of the donation increases.</p>
      <p><i class="fa fa-check"></i> 
      Idle Money crowdfunding is a way of raising money by asking a large group of people to donate.</p>
      <p><i class="fa fa-check"></i>  Donation levels can be set with associated perks or rewards.</p>
      <p><i class="fa fa-check"></i>  Donation is different from loans or equity, in that there is no promise to repay or ownership stake.</p> 
    </div>
  </section>
</main>
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-info">
          <img src="<?php echo base_url();?>axxets/template8/images/logo.png" style="max-height: 80px; width: 80%">
          <br>
          <br>
          <p>IDLE MONEY combines the best of crowdsourcing, bringing 
          together various individuals who commit money to projects and companies 
          they want to support. It’s a young and quickly growing market and it's 
          transforming how people behave with their money. </p>
        </div>
        <div class="col-md-1 footer-links">
        </div>
        <div class="col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="ion-ios-arrow-right"></i> <a href="https://idlemoney.in/web/index.php">Home</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('contact') ?>">Contact Us</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo site_url('about'); ?>">About Us</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
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
      © Copyright <strong>Idle Money</strong>. All Rights Reserved
    </div> 
  </div>
</footer>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<nav id="mobile-nav">
  <ul class="" style="touch-action: pan-y;" id="">
    <li class="menu-active"><a target="_blank"  href="https://idlemoney.in/web/index.php">Home</a></li>
    <li><a target="_blank" href="https://idlemoney.in/web/about.php">About Us</a></li>
    <li><a target="_blank" href="https://idlemoney.in/web/contact.php">Contact</a></li>
    <li><a target="_blank" href="https://idlemoney.in/user/login/">Login</a></li>
    <li><a target="_blank" href="https://idlemoney.in/join/">Register</a></li>
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
<script src="<?php echo base_url();?>axxets/template8/js/jquery.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/jquery-migrate.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/easing.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/hoverIntent.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/superfish.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/wow.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/waypoints.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/counterup.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/owl.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/isotope.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/lightbox.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/jquery_002.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/contactform.js"></script>
<script src="<?php echo base_url();?>axxets/template8/js/main.js"></script>
</body>
</html>

