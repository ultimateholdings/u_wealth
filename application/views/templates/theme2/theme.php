<?php
if (isset($_POST['submit'])) 
{
       //echo "email";
        $to = config_item('email');
        $name=$_POST['form-name'];
        //print_r($name);die();
        $email=$_POST['form-email'];
        $userphone=$_POST['phone'];
        $usermsg=$_POST['form-message'];
        $from = 'From: My Contact Form';
        $headers = "From:" . $email;
        $body = "From: $name\n E-Mail: $email\n Phone: $userphone\n  Message:\n $usermsg";
        //mail($to,$usermsg,$body,$headers);
        if (mail($to,$usermsg,$body,$headers)) {
                       $success = "Message successfully sent";
           }else {
                  $success = "Message Sending Failed, try again";
           }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo config_item('company_name') ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">
  <link href="css(1)" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/line-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/aos.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/templates/theme2/css/style(1).css" rel="stylesheet">
</head>

<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">
  <button type="button" class="mobile-nav-toggle d-lg-none"><i class="fa fa-bars"></i></button>
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">
      <div class="logo mr-auto">
        <h1 class="text-light"><a href="">LOGO</a></h1>
      </div>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="">Home</a></li>
          <li class=""><a href="#about">About</a></li>
          <li class=""><a href="#services">Services</a></li>
          <li><a href="#pricing">Pricing</a></li>
           <li><a href="#testimonials">Testimonial</a></li>
          <li><a href="">Business Plan</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="<?php echo site_url('site/login'); ?>" target="_blanlk">Login</a></li>
                    <li><a href="<?php echo site_url('site/register'); ?>" target="_blank">Join Now</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animated fadeInDown"><?php echo config_item('company_name').' ' ?>Offers Affordable IT, Software & Business Services</h2>
          <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animated fadeInDown">Full Range of IT, Software & Business Services</h2>
          <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
        </div>
      </div>
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animated fadeInDown">Welcome to <span><?php echo config_item('company_name').' ' ?></span></h2>
          <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
        </div>
      </div>
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <svg class="hero-waves" xmlns="" xmlns:xlink="" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </path></defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </use></g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </use></g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </use></g>
    </svg>
  </section>
  <main id="main">
    <section id="about" class="about">
      <div class="container">
        <div class="section-title aos-init aos-animate" data-aos="zoom-out">
          <h2>About</h2>
          <p>Who we are</p>
        </div>
        <div class="row content aos-init aos-animate" data-aos="fade-up">
          <div class="col-lg-6">
            <p>
             <?php echo config_item('company_name').' ' ?> is the best IT and Software development company helping companies across globe to transform their business using cutting edge technologies in mobility, data analytics and user experience.
            </p>
            <p>
              Our deep expertise in retail, manufacturing, health, entertainment, Education, Banking & Financial services have helped companies realize exponential benefits.
            </p>
            <p>Our ready made software products such as eCommerce marketplace, ERP, CRM, POS, MLM, Cashback etc… help client business to automate and grow at 10x.</p>
            <p><b style="color: #ef6603;">Our vision :</b> “To be most trusted and respected consultancy service firm recognized by our clients for delivering excellence.”<br>
            <b style="color: #ef6603;"> Our mission :</b> “To serve our clients by providing the highest quality of consultancy services that address their issues. We deliver the superior financial results to investment community while contributing to the communities in which we live and work.”</p>
          </div>
           <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?php echo base_url();?>axxets/templates/theme2/images/features-1.png" alt="" class="img-fluid">
            </div>
        </div>
      </div>
    </section>
    <section id="cta" class="cta">
      <div class="container">
        <div class="row aos-init aos-animate" data-aos="zoom-out">
          <div class="col-lg-9 text-center text-lg-left">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>
      </div>
    </section>
    <section id="services" class="services">
      <div class="container">
        <div class="section-title aos-init aos-animate" data-aos="zoom-out">
          <h2>Services</h2>
          <p>What we do offer</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left">
              <div class="icon"><i class="fa fa-file-text-o" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Best Plan</a></h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="100">
              <div class="icon"><i class="fa fa-mobile-phone" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Maximum Earnings</a></h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="200">
              <div class="icon"><i class="  fa fa-calendar" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Timely Payout</a></h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="300">
              <div class="icon"><i class="fa fa-edit" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Features</a></h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="400">
              <div class="icon"><i class="fa fa-usd" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">Payments</a></h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init" data-aos="zoom-in-left" data-aos-delay="500">
              <div class="icon"><i class="fa fa-laptop" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">10+ years Experience</a></h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="pricing" class="pricing">
      <div class="container">
        <div class="section-title aos-init" data-aos="zoom-out">
          <h2>Pricing</h2>
          <p>Our Competing Prices</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="box featured aos-init" data-aos="zoom-in">
              <h3>Basic</h3>
              <h4><sup>$</sup>1000</h4>
              <ul>
                <li>3:1 Matrix</li>
                <li>Auto Assign</li>
                <li>Pay Out/In Option</li>
                <li>Referral Wallet</li>
                <li>Cash Out</li>
                <li>WildCard Auto Recycle</li>
                <li>15,000 Return Investment</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured aos-init" data-aos="zoom-in" data-aos-delay="100">
              <h3>PREMIUM</h3>
              <h4><sup>$</sup>5,000</h4>
               <ul>
                <li>3:1 Matrix</li>
                <li>Auto Assign</li>
                <li>Pay Out/In Option</li>
                <li>Referral Wallet</li>
                <li>Cash Out</li>
                <li>WildCard Auto Recycle</li>
                <li>15,000 Return Investment</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box featured aos-init" data-aos="zoom-in" data-aos-delay="200">
              <h3>BUSINESS</h3>
              <h4><sup>$</sup>10,000</h4>
               <ul>
                <li>3:1 Matrix</li>
                <li>Auto Assign</li>
                <li>Pay Out/In Option</li>
                <li>Referral Wallet</li>
                <li>Cash Out</li>
                <li>WildCard Auto Recycle</li>
                <li>15,000 Return Investment</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box featured aos-init" data-aos="zoom-in" data-aos-delay="300">
              <span class="advanced">Advanced</span>
              <h3>ULTIMATE</h3>
              <h4><sup>$</sup>20,000</h4>
               <ul>
                <li>3:1 Matrix</li>
                <li>Auto Assign</li>
                <li>Pay Out/In Option</li>
                <li>Referral Wallet</li>
                <li>Cash Out</li>
                <li>WildCard Auto Recycle</li>
                <li>15,000 Return Investment</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials" class="testimonials">
      <div class="container">
        <div class="section-title aos-init" data-aos="zoom-out">
          <h2>Testimonials</h2>
          <p>What they are saying about us</p>
        </div>
        <div class="owl-carousel testimonials-carousel owl-loaded owl-drag aos-init" data-aos="fade-up">
          <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(-1110px, 0px, 0px); transition: all 0.25s ease 0s; width: 4070px;">
              <div class="owl-item cloned" style="width: 370px;">
                <div class="testimonial-item">
                  <p>
                    <i class="fa fa-quote-left quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="fa fa-quote-right quote-icon-right"></i>
                  </p>
                  <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
              <div class="owl-item cloned" style="width: 370px;">
                <div class="testimonial-item">
                  <p>
                    <i class="fa fa-quote-left quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    <i class="fa fa-quote-right quote-icon-right"></i>
                  </p>
                  <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                </div>
              </div>
              <div class="owl-item cloned" style="width: 370px;">
                <div class="testimonial-item">
                    <p>
                      <i class="fa fa-quote-left quote-icon-left"></i>
                      Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                      <i class="fa fa-quote-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>
              </div>
              <div class="owl-item active" style="width: 370px;">
                <div class="testimonial-item">
                  <p>
                    <i class="fa fa-quote-left quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="fa fa-quote-right quote-icon-right"></i>
                  </p>
                  <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
              <div class="owl-item active" style="width: 370px;">
                <div class="testimonial-item">
                    <p>
                      <i class="fa fa-quote-left quote-icon-left"></i>
                      Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                      <i class="fa fa-quote-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                </div>
              </div>
              <div class="owl-item active" style="width: 370px;">
                <div class="testimonial-item">
                  <p>
                    <i class="fa fa-quote-left quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="fa fa-quote-right quote-icon-right"></i>
                  </p>
                  <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
              <div class="owl-item" style="width: 370px;">
                <div class="testimonial-item">
                    <p>
                      <i class="fa fa-quote-left quote-icon-left"></i>
                      Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                      <i class="fa fa-quote-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                </div>
              </div>
              <div class="owl-item" style="width: 370px;">
                <div class="testimonial-item">
                    <p>
                      <i class="fa fa-quote-left quote-icon-left"></i>
                      Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                      <i class="fa fa-quote-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>
              </div>
              <div class="owl-item cloned" style="width: 370px;">
                <div class="testimonial-item">
                  <p>
                    <i class="fa fa-quote-left quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="fa fa-quote-right quote-icon-right"></i>
                  </p>
                  <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
              <div class="owl-item cloned" style="width: 370px;">
                <div class="testimonial-item">
                  <p>
                    <i class="fa fa-quote-left quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="fa fa-quote-right quote-icon-right"></i>
                  </p>
                  <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>
              <div class="owl-item cloned" style="width: 370px;">
                <div class="testimonial-item">
                  <p>
                    <i class=" quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="fa fa-quote-right quote-icon-right"></i>
                  </p>
                  <img src="<?php echo base_url();?>axxets/templates/theme2/images/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="owl-nav disabled">
            <button type="button" role="presentation" class="owl-prev">
              <span aria-label="Previous">‹</span>
            </button>
            <button type="button" role="presentation" class="owl-next">
              <span aria-label="Next">›</span>
            </button>
          </div>
          <div class="owl-dots">
          </div>
        </div>
      </div>
    </section>
   
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title aos-init" data-aos="zoom-out">
          <h2>Contact</h2>
          <h3 class="bar-title">Contact Now</h3>
            <div class="alert-custom" role="alert" style="color:blue;" ><?php if(isset($success)){ echo $success;} ?> </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4 aos-init" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="fa fa-map-marker  "></i>
                <h4>Location:</h4>
                <p> <?php echo config_item('company_address'); ?><br>
                    <?php echo config_item('company_city'); ?>
                    <br>
                    <?php echo config_item('company_state'); ?> - 
                    <?php echo config_item('company_zipcode'); ?></p>
              </div>

              <div class="email">
                <i class="fa fa-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo config_item('email'); ?></p>
              </div>

              <div class="phone">
                <i class="fa fa-phone"></i>
                <h4>Call:</h4>
                <p><?php echo config_item('phone'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0 aos-init" data-aos="fade-left">
            <form action="" method="post" role="form" class="">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="required">
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required="required">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required="required">
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required="required"></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center"><button class="btn btn-info" type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer">
    <div class="container">
      <h3><?php echo config_item('company_name').' ' ?></h3>
      <p><?php echo config_item('about_us') ?></p>
      <div class="social-links">
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#" ><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-skype"></i></a>
        <a href="#" ><i class="fa fa-linkedin"></i></a>
      </div>
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
  <a href="#" class="back-to-top" style="display: none;"><i class="fa fa-angle-double-up"></i></a>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/jquery.min.js.download">"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/bootstrap.bundle.min.js.download"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/jquery.easing.min.js.download"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/validate.js.download"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/isotope.pkgd.min.js.download"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/venobox.min.js.download"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/owl.carousel.min.js.download"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/aos.js.download"></script>
  <script src="<?php echo base_url();?>axxets/templates/theme2/js/main.js.download"></script>
    
  <script>if( window.self == window.top ) { (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-55234356-4', 'auto'); ga('send', 'pageview'); } </script>
</body>
</html>