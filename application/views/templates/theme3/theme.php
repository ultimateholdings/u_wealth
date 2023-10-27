<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo config_item('company_name') ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <link href="<?php echo base_url();?>axxets/templates/theme3/files/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme3/files/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme3/files/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme3/files/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme3/files/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme3/files/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme3/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme3/css/style(1).css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
        <a href="#intro" class="scrollto"><img src="" alt="" class="img-fluid">LOGO</a>
      </div>
      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#">Business Plan</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="<?php echo site_url('site/login'); ?>" target="_blanlk">Login</a></li>
          <li><a href="<?php echo site_url('site/register'); ?>" target="_blank">Register</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section id="intro" class="clearfix">
    <div class="container">
      <div class="intro-img">
        <img src="<?php echo base_url();?>axxets/templates/theme3/images/intro-img.svg" alt="" class="img-fluid">
      </div>
      <div class="intro-info">
        <h2>We provide<br><span>solutions</span><br>for your business!</h2>
        <div>
          <a href="<?php echo site_url('site/register'); ?>" class="btn-get-started scrollto">Get Started</a>
          <a href="#services" class="btn-services scrollto">Our Services</a>
        </div>
      </div>

    </div>
  </section>

  <main id="main">
    <section id="about">
      <div class="container">
        <header class="section-header">
          <h3>About Us</h3>
          <p><?php echo config_item('company_name').' ' ?> provides you the best platform and environment to act and achieve big as well as to create your present and future to bring happiness in your life</p>
        </header>

        <div class="row about-extra">
          <div class="col-lg-6 wow fadeInUp">
            <img src="<?php echo base_url();?>axxets/templates/theme3/images/about-extra-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <h4>We help you realize Financial Freedom !!</h4>
            <p>
              We are a platform aiming to come up with ideas to assist people enrich themselves by doing the following
            </p>
           <ol>
             <li>Using MLM tools and technology to provide access to wealth</li>
             <br>
             <li>Becoming transparent to investors so they see the movement of their investment moneys</li>
             <br>
             <li>To empower investors so that they make decisions on how to grow the platform without crushing their ideas. This brings us to our platform values.</li>
           </ol>
          </div>
        </div>
        <br><br>
      </div>
    </section>
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Services</h3>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Best Plan</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Maximum Earnings</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Timely Payout</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Features</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-world-outline" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">Payments</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-clock-outline" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">10+ Years Experience</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <i class="fa fa-diamond"></i>
              <div class="card-body">
                <h5 class="card-title">Our Mission</h5>
                <p class="card-text">BRING PROSPERITY</p>
                <div class="card-text">PASSIONATE ABOUT LIFE</div>
                <p class="card-text">Give every person a lifetime opportunity to become a successful wealthy person</p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <i class="fa fa-language"></i>
              <div class="card-body">
                <h5 class="card-title">Our Vission</h5>
                <p class="card-text">DELIVERY VALUE</p>
                <div class="card-text">QUALITY CONSCIOUSNESS</div>
                <p class="card-text">Delivery value to our customer in all the products and services we provide</p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <i class="fa fa-object-group"></i>
              <div class="card-body">
                <h5 class="card-title">Our Value</h5>
                <p class="card-text">CUSTOMER SATISFACTION</p>
                <div class="card-text">BRINGING HAPPINESS</div>
                <p class="card-text">We provide utmost priority to customer priority</p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

        </div>
        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">2172</span>
            <p>Registrations</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1000</span>
            <p>Happy Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1200</span>
            <p>Total clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1172</span>
            <p>Winning Awards</p>
          </div>
        </div>
      </div>
    </section>
    <section id="pricing" class="pricing">
      <div class="container">
        <div  data-aos="zoom-out">
          <p class="section-title">Joining Fee</p>
        </div>
        <p style="text-align: center">There are many variations of plans available.</p>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="box featured aos-init" data-aos="zoom-in">
              <h3>Basic</h3>
              <h4><sup>$</sup>1000</h4>
              <ul>
                <li>Lifetime Membership</li>
                <li>1% Referral Commission</li>
                <li>Pay Out/In Option</li>
                <li>Referral Wallet</li>
                <li>1% Sales Commission</li>
                <li>Dedicated Useable Account</li>
              </ul>
              <div class="btn-wrap">
                <a href="<?php echo site_url('site/register'); ?>" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured aos-init" data-aos="zoom-in" data-aos-delay="100">
              <h3>PREMIUM</h3>
              <h4><sup>$</sup>5,000</h4>
               <ul>
                <li>Lifetime Membership</li>
                <li>6% Referral Commission</li>
                <li>Pay Out/In Option</li>
                <li>Referral Wallet</li>
                <li>6% Sales Commission</li>
                <li>Dedicated Useable Account</li>
              </ul>
              <div class="btn-wrap">
                <a href="<?php echo site_url('site/register'); ?>" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box featured aos-init" data-aos="zoom-in" data-aos-delay="200">
              <h3>BUSINESS</h3>
              <h4><sup>$</sup>10,000</h4>
               <ul>
                <li>Lifetime Membership</li>
                <li>14% Referral Commission</li>
                <li>Pay Out/In Option</li>
                <li>Referral Wallet</li>
                <li>14% Sales Commission</li>
                <li>Dedicated Useable Account</li>
              </ul>
              <div class="btn-wrap">
                <a href="<?php echo site_url('site/register'); ?>" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box featured aos-init" data-aos="zoom-in" data-aos-delay="300">
              <span class="advanced">Advanced</span>
              <h3>ULTIMATE</h3>
              <h4><sup>$</sup>20,000</h4>
               <ul>
                <li>Lifetime Membership</li>
                <li>30% Referral Commission</li>
                <li>Pay Out/In Option</li>
                <li>Referral Wallet</li>
                <li>30% Sales Commission</li>
                <li>Dedicated Useable Account</li>
              </ul>
              <div class="btn-wrap">
                <a href="<?php echo site_url('site/register'); ?>" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br> <br><br>
    <section id="testimonials" class="section-bg">
      <div class="container">
        <header class="section-header">
          <h3>Testimonials</h3>
        </header>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="owl-carousel testimonials-carousel wow fadeInUp">
              <div class="testimonial-item">
                <img src="<?php echo base_url();?>axxets/templates/theme3/images/testimonial-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
              </div>
              <div class="testimonial-item">
                <img src="<?php echo base_url();?>axxets/templates/theme3/images/testimonial-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
              </div>

              <div class="testimonial-item">
                <img src="<?php echo base_url();?>axxets/templates/theme3/images/testimonial-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
              </div>

              <div class="testimonial-item">
                <img src="<?php echo base_url();?>axxets/templates/theme3/images/testimonial-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
              </div>

              <div class="testimonial-item">
                <img src="<?php echo base_url();?>axxets/templates/theme3/images/testimonial-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="contact">
      <div class="container-fluid">
        <div class="section-header">
          <h3>Contact Us</h3>
        </div>
        <div class="row wow fadeInUp">
          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
              <iframe src="" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p><?php echo config_item('company_address'); ?><br>
                    <?php echo config_item('company_city'); ?>
                    <br>
                    <?php echo config_item('company_state'); ?> - 
                    <?php echo config_item('company_zipcode'); ?></p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p><?php echo config_item('email'); ?></p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p><?php echo config_item('phone'); ?></p>
              </div>
            </div>
            <div class="form">
              <form action="" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 footer-info">
            <h3><?php echo config_item('company_name').' ' ?></h3>
            <p><p><?php echo config_item('about_us') ?></p></p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <strong>Address:</strong> <?php echo config_item('company_address'); ?><br>
                    <?php echo config_item('company_city'); ?>
                    <br>
                    <?php echo config_item('company_state'); ?> - 
                    <?php echo config_item('company_zipcode'); ?></p><br>
              <strong>Phone:</strong><?php echo config_item('phone'); ?><br>
              <strong>Email:</strong> <?php echo config_item('email'); ?><br>
            </p>
            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="<?php echo site_url('site/register')?>" method="post">
              <input type="email" name="email" required="" ><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div

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
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/mobile-nav/mobile-nav.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/wow/wow.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/files/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme3/js/main.js"></script>
</body>
</html>