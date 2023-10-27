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


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <title><?php echo config_item('company_name') ?></title>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="<?php echo base_url();?>axxets/classic/images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url();?>axxets/classic/images/favicon.ico" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/classic/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/classic/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/classic/css/icofont.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/classic/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/classic/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/classic/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/classic/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/classic/css/responsive.css">
    <script src="<?php echo base_url();?>axxets/classic/js/vendor/modernizr-2.8.3.min.js"></script>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".mainmenu-area">

    <!-- Mainmenu-Area -->
    <nav class="navbar mainmenu-area" data-spy="affix" data-offset-top="197">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="navbar-header smoth">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                        </button>
                        <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo" style="margin-bottom: 0px; margin-top: 10px;"><a href="<?php echo base_url('site/classic') ?>" class="h2 mb-0" style="color:#fff;">Company<span class="text-primary">.</span> </a></h1>
          </div>
                    </div>
                    <div class="collapse navbar-collapse navbar-right" id="mainmenu">
                        <ul class="nav navbar-nav primary-menu">
                            <li class="active"><a href="<?php echo site_url('site/classic')?>#home-area" class="nav-link">Home</a></li>
                            <li><a href="#about-area" class="nav-link">About Us</a>
                            <li><a href="#" class="nav-link">Business Plan</a></li>
                            <li><a href="#contact-area" class="nav-link">Contact</a></li>
                            <li><a target="_blank" href="<?php echo site_url('site/register')?>" class="nav-link">Register</a></li>
                            <li><a target="_blank" href="<?php echo site_url('site/login')?>">Member Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Mainmenu-Area-/ -->


    <!--Header-Area-->
    <header class="header-area overlay" id="home-area">
        <div class="vcenter">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-md-8">
                        <div class="header-text">
                            <h2 class="header-title wow fadeInUp">Realize Financial Freedom <span class="dot"></span></h2>
                            <div class="wow fadeInUp" data-wow-delay="0.5s"><q>We provide Best platform to achieve Big !!</q></div>
                            <div class="wow fadeInUp" data-wow-delay="0.7s">
                                <a href="#" class="bttn bttn-lg bttn-primary">Contact Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header-Area-/-->


    <!-- About-Area -->
    <section class="section-padding" id="about-area">
        <div class="site-section cta-big-image" id="about-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-8 col-md-offset-2 text-center" >
                        <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="" >About Us</h2>
                        <p class="lead" data-aos="fade-up" data-aos-delay="100"><?php echo config_item('company_name').' ' ?>provides you the best platform and environment to act and achieve big as well as to create your present and future to bring happiness in your life</p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                        <figure class="circle-bg">
                        <img src="<?php echo base_url();?>axxets/classic/images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                        </figure>
                    </div>
                        <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">   
                            <h3 class="text-black mb-4">We help you realize Financial Freedom !!</h3>
                            <p>We are a platform aiming to come up with ideas to assist people enrich themselves by doing the following</p>
                            <ol type="1">
                                <li>Using MLM tools and technology to provide access to wealth</li>
                                <li>Becoming transparent to investors so they see the movement of their investment moneys</li>
                                <li>To empower investors so that they make decisions on how to grow the platform without crushing their ideas. This brings us to our platform values.</li>
                        </div>
                </div>            
            </div>  
        </div>
    </section>
    <!-- About-Area / -->



    <section class="section-padding gray-bg" id="plan-area">
        <div class="site-section cta-big-image" id="plan-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="video-box">
                            <img src="<?php echo base_url();?>axxets/classic/images/video-image.png" alt="">
                            <a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="video-bttn"><img src="<?php echo base_url();?>axxets/classic/images/video-button.png" alt=""></a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1 wow fadeInUp">
                        <div class="page-title">
                            <h2 class="title">Why Choose Us?</h2>
                            <ul class="tabs-list">
                                <li class="active"><a data-toggle="pill" href="#our_mission">Our Mission</a></li>
                                <li><a data-toggle="pill" href="#our_vission">Our Vission</a></li>
                                <li><a data-toggle="pill" href="#our_support">Our Value</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="our_mission" class="tab-pane fade in active">
                                <h4 class="upper thing">Bring Prosperity</h4>
                                <h3 class="upper">PASSIONATE ABOUT LIFE</h3>
                                <p>Give every person a lifetime opportunity to become a successful wealthy person</p>
                                <br />
                                <a href="#" class="bttn bttn-sm bttn-primary">View More</a>
                            </div>
                            <div id="our_vission" class="tab-pane fade">
                                <h4 class="upper thing">delivery value </h4>
                                <h3 class="upper">Quality Consciousness </h3>
                                <p>Delivery value to our customer in all the products and services we provide</p>
                                <br />
                                <a href="#" class="bttn bttn-sm bttn-primary">View More</a>
                            </div>
                            <div id="our_support" class="tab-pane fade">
                                <h4 class="upper thing">Customer Satisfaction</h4>
                                <h3 class="upper">Bringing Happiness</h3>
                                <p>We provide utmost priority to customer priority</p>
                                <br />
                                <a href="#" class="bttn bttn-sm bttn-primary">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section-padding" id="service-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="icofont icofont-idea"></i>
                        </div>
                        <h4>Best Plan</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="#" class="read-more" style="display: none;"> Read More</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="icofont icofont-code-alt"></i>
                        </div>
                        <h4>Maximum Earnings</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="#" class="read-more" style="display: none;"> Read More</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="icofont icofont-monitor"></i>
                        </div>
                        <h4>Timely Payout</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="#" class="read-more" style="display: none;"> Read More</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" data-wow-delay="1.2s">
                        <div class="box-icon">
                            <i class="icofont icofont-chart-bar-graph"></i>
                        </div>
                        <h4>Features</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="#" class="read-more" style="display: none;"> Read More</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" data-wow-delay="1s">
                        <div class="box-icon">
                            <i class="icofont icofont-money-bag"></i>
                        </div>
                        <h4>Payments</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="#" class="read-more" style="display: none;"> Read More</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" data-wow-delay="0.8s">
                        <div class="box-icon">
                            <i class="icofont icofont-files"></i>
                        </div>
                        <h4>10+ Years Experience</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a href="#" class="read-more" style="display: none;"> Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Skill-Area -->
    <section class="section-padding gray-bg" id="skill-area" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="page-title">
                        <h2 class="title wow fadeInUp">Our Professional Skill</h2>
                        <div class="wow fadeInUp">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look.</p>
                        </div>
                    </div>
                    <div class="skills skills1 row">
                        <!-- main skill No. 1 -->
                        <div class="skill col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="chart chart1 center" data-percent="95">
                                <span class="counter">95</span>
                            </div>
                            <h6>WebDesign</h6>
                        </div>
                        <!-- main skill No. 2 -->
                        <div class="skill col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="chart chart1 center" data-percent="85">
                                <span class="counter">85</span>
                            </div>
                            <h6>Coding</h6>
                        </div>
                        <!-- main skill No. 3 -->
                        <div class="skill col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="chart chart1 center" data-percent="90">
                                <span class="counter">90</span>
                            </div>
                            <h6>Developing</h6>
                        </div>
                        <!-- main skill No. 4 -->
                        <div class="skill col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="1.2s">
                            <div class="chart chart1 center" data-percent="95">
                                <span class="counter">95</span>
                            </div>
                            <h6>Java Script</h6>
                        </div>
                        <!-- main skill No. 4 -->
                        <div class="skill col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="1s">
                            <div class="chart chart1 center" data-percent="85">
                                <span class="counter">85</span>
                            </div>
                            <h6>Apps Design</h6>
                        </div>
                        <!-- main skill No. 4 -->
                        <div class="skill col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.8s">
                            <div class="chart chart1 center" data-percent="90">
                                <span class="counter">90</span>
                            </div>
                            <h6>Graphics Script</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-offset-1">
                    <img src="<?php echo base_url();?>axxets/classic/images/skill-image.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Skill-Area / -->





    <!-- Portfolio-Area -->
   
    <!-- Portfolio-Area / -->



    <!-- Team-Area -->
   
    <!-- Team-Area / -->



    <!-- Price-Area -->
    <section class="section-padding gray-bg" id="price-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title text-center">
                        <h2 class="title">Joining Fee</h2>
                        <p>There are many variations of plans available.</p>
                    </div>
                </div>
            </div>
            <div class="row" style="display: none;">
                <div class="col-xs-12">
                    <ul class="price-tabs">
                        <li class="active"><a data-toggle="pill" href="#monthly">Monthly</a></li>
                        <li><a data-toggle="pill" href="#yearly">Yearly</a></li>
                    </ul>
                </div>
            </div>
            <div class="row prices tab-content">
                <div id="monthly" class="tab-pane fade in active">
                    <div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="price-box">
                            <h4>Basic</h4>
                            <h3 class="amount"><?php echo config_item('currency') . '1,000';?></h3>
                            <ul class="price-list">
                                <li>Lifetime Membership</li>
                                <li>1% Referral Commission</li>
                                <li>1% Sales Commission</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="price-box active">
                            <h4>Premium</h4>
                            <h3 class="amount"><?php echo config_item('currency') . '5,000';?></h3>
                            <ul class="price-list">
                                <li>Lifetime Membership</li>
                                <li>6% Referral Commission</li>
                                <li>6% Sales Commission</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="price-box">
                            <h4>Business</h4>
                            <h3 class="amount"><?php echo config_item('currency') . '10,000';?></h3>
                            <ul class="price-list">
                                <li>Lifetime Membership</li>
                                <li>14% Referral Commission</li>
                                <li>14% Sales Commission</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.8s">
                        <div class="price-box">
                            <h4>Ultimate</h4>
                            <h3 class="amount"><?php echo config_item('currency') . '20,000';?></h3>
                            <ul class="price-list">
                                <li>Lifetime Membership</li>
                                <li>30% Referral Commission</li>
                                <li>30% Sales Commission</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                </div>
                <div id="yearly" class="tab-pane fade">
                    <div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="price-box">
                            <h4>Basic</h4>
                            <h3 class="amount">&#36;10 /<span>Year</span></h3>
                            <ul class="price-list">
                                <li>Free Useable</li>
                                <li>Easily can useable 10GB</li>
                                <li>Free Secuirity Service</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="#" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="price-box active">
                            <h4>Premium</h4>
                            <h3 class="amount">&#36;50 /<span>Year</span></h3>
                            <ul class="price-list">
                                <li>Free Useable</li>
                                <li>Easily can useable 10GB</li>
                                <li>Free Secuirity Service</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="#" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="price-box">
                            <h4>Business</h4>
                            <h3 class="amount">&#36;80 /<span>Year</span></h3>
                            <ul class="price-list">
                                <li>Free Useable</li>
                                <li>Easily can useable 10GB</li>
                                <li>Free Secuirity Service</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="#" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.8s">
                        <div class="price-box">
                            <h4>Ultimate</h4>
                            <h3 class="amount">&#36;100 /<span>Year</span></h3>
                            <ul class="price-list">
                                <li>Free Useable</li>
                                <li>Easily can useable 10GB</li>
                                <li>Free Secuirity Service</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="#" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Price-Area -->


    <!-- Blog-area -->
    
    <!-- Blog-area / -->


    <section class="section-padding gray-bg">
        <div class="container">
            <div class="row counters">
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="count-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="count-icon">
                            <i class="icofont icofont-bag-alt"></i>
                        </div>
                        <span class="count_title">Registrations</span>
                        <h2 class="count">2172</h2>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="count-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="count-icon">
                            <i class="icofont icofont-emo-simple-smile"></i>
                        </div>
                        <span class="count_title">Happy Client’S</span>
                        <h2 class="count">1000</h2>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="count-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="count-icon">
                            <i class="icofont icofont-businessman"></i>
                        </div>
                        <span class="count_title">Total Client’s</span>
                        <h2 class="count">1200</h2>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="count-box wow fadeInUp" data-wow-delay="0.8s">
                        <div class="count-icon">
                            <i class="icofont icofont-money"></i>
                        </div>
                        <span class="count_title">Wining Award</span>
                        <h2 class="count">1172</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact-Area -->
    <section class="section-padding" id="contact-area">
        <div class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title">
                            <h3 class="bar-title">Contact Now</h3>
                            <div class="alert-custom" role="alert" style="color:blue;" ><?php if(isset($success)){ echo $success;} ?> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="contact-form">
                            <form method="post" action="#">
                                <div class="form-double">
                                    <input type="text" id="form-name" name="form-name" placeholder="Full Name" required="required">
                                    <input type="number" placeholder="Phone Number" name="phone">
                                </div>
                                <div class="form-double">
                                    <input type="email" name="form-email" name="email" id="form-email" placeholder="Your Email" required="required">
                                    <input type="text" name="form-subject" id="form-subject" placeholder="Subject" required="required">
                                </div>
                                <textarea name="form-message" id="message" name="form-message" rows="5" required="required" placeholder="Message"></textarea>
                               <!-- <button class="bttn bttn-primary" type="submit" name="submit">Send Now</button>-->
                               <input type="submit" name="submit" class="bttn bttn-primary" value="Submit Now ">
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="contact-info">
                            <ul class="info">
                                <li>
                                    <span class="info-icon">
                                        <i class="icofont icofont-social-google-map"></i>
                                    </span> <?php echo config_item('company_name'); ?> <br /> <?php echo config_item('company_address'); ?>
                                </li>
                                <li>
                                    <span class="info-icon">
                                        <i class="icofont icofont-ui-cell-phone"></i>
                                    </span> <?php echo config_item('phone'); ?>
                                </li>
                                <li>
                                    <span class="info-icon">
                                        <i class="icofont icofont-envelope"></i>
                                    </span><?php echo config_item('email'); ?>
                                </li>
                            </ul>
                            <div class="social-menu-2">
                                <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                <a href="#"><i class="icofont icofont-social-skype"></i></a>
                                <a href="#"><i class="icofont icofont-social-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-Area / -->
    <div>
        <iframe src="<?php echo config_item('google_map'); ?>" width="100%" height='600px' frameborder="0" style="border:0;" allowfullscreen="" scrolling="no" marginheight="0" marginwidth="0"></iframe><br><small><a target='_blank' href="https://goo.gl/maps/CJpjJLToPxgfMskQA" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
    </div>


    <!-- Footer-Area -->
    <footer class="footer-area">
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3 ">
                        <div class="footer-text">
                            <h4 class="upper"><?php echo config_item('company_name') ?></h4>
                            <p>We aim to provide you the best platform and environment to act and achieve big </p>
                            <div class="social-menu">
                                <a href="<?php echo config_item('facebook') ?>" target="_blank"><i class="icofont icofont-social-facebook"></i></a>
                                <a href="<?php echo config_item('twitter') ?>" target="_blank"><i class="icofont icofont-social-twitter"></i></a>
                                <a href="<?php echo config_item('linkedin') ?>" target="_blank"><i class="icofont icofont-social-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-md-offset-1">
                        <div class="footer-single">
                            <h4 class="upper">Company</h4>
                            <ul>
                                <li><a href="#about-area">About Us</a></li>
                                <li><a href="#plan-area">Why choose us?</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <div class="footer-single">
                            <h4 class="upper">Users</h4>
                            <ul>
                                <li><a target="_blank" href="<?php echo site_url('site/login')?>">Login</a></li>
                                <li><a target="_blank" href="<?php echo site_url('site/register')?>">Register</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <div class="footer-single">
                            <h4 class="upper">Resources</h4>
                            <ul>
                                <li><a href="#contact-area">Support</a></li>
                                <li><a href="#contact-area">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All right reserved by <?php echo config_item('company_name') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-Area / -->


    <!--Vendor-JS-->
    <script src="<?php echo base_url();?>axxets/classic/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="<?php echo base_url();?>axxets/classic/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/appear.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/bars.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/counterup.min.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/easypiechart.min.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/mixitup.min.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/contact-form.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/wow.min.js"></script>
    <!--Main-active-JS-->
    <script src="<?php echo base_url();?>axxets/classic/js/main.js"></script>
    <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXZ3vJtdK6aKAEWBovZFe4YKj1SGo9V20&callback=initMap"></script>
    <script src="<?php echo base_url();?>axxets/classic/js/maps.js"></script>
    -->
</body>

</html>