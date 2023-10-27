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
<html lang="en">
  <head>
    <title><?php echo config_item('company_name').' ' ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
        @media only screen and (max-width: 600px) {
  html{
    overflow-x: hidden;
  }
  body {
    overflow-x: hidden;
  }

}
    </style>
    <!-- carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/cyptian/css/owl.carousel.min.css">
    <!--header icon CSS -->
    <link rel="icon" href="<?php echo base_url();?>axxets/templates/cyptian/img/fabicon.png">
    <!-- animations CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/cyptian/css/animate.min.css">
    <!-- font-awsome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/cyptian/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/cyptian/css/bootstrap.min.css">
    <!-- mobile menu CSS -->
    <!--css animation-->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/cyptian/css/animation.css">
    <!--css animation-->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/cyptian/css/material-design-iconic-font.min.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/cyptian/css/style.css">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/css/responsive.css">
  </head>
  <body>
    <!--header area start-->
     
       
    <!--header area end-->

    <!--welcome area start-->
    <div class="welcome-area wow fadeInUp" id="home">

        <div id="particles-js"></div>
        <div style="margin-top: -75px;">
            <div>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="opacity: 0.98; background: #062489;">
              <div class="coL-12 col-lg-4">  
              <a class="navbar-brand" href="#home"style="color:white;font-size:22px;font-weight:700;"><?php echo config_item('company_name').' ' ?></a>
              </div>
              <div class="coL-12 col-lg-4"> 
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="color:black;">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-5">
                    <ul class="navbar-nav">
                  <li><a class="nav-item nav-link active" href="#home" style="color:white;">Home <span class="sr-only">Home</span></a></li>
                  <li><a class="nav-item nav-link active" href="#about" style="color:white;">About</a></li>
                  <li><a class="nav-item nav-link" href="#token" style="color:white;">Plans</a></li>
                  <li><a class="nav-item nav-link" href="#contact" style="color:white;">Contact</a></li>
                  <li><a class="nav-item nav-link" href="<?php echo site_url('site/login')?>"style="color:white;">Login</a></li>
                  <li><a class="nav-item nav-link" href="<?php echo site_url('site/register')?>"style="color:white;">Register</a></li>
                  </ul>
                </div>
              </div>
              </div>
            </nav>
            </div>
        </div>
        <div class="container" style="margin-top: 90px;">
            <div class="row">
                <div class="col-12 col-md-6 align-self-center">
                    <div class="welcome-right">
                        <div class="welcome-text">
                             <h1>Fast Growing ICO 
                            Agency for Blockchain
                            Investors and Founders </h1>
                            <h4>Sifting through teaspoons of clay and sand scraped from the 
    floors of caves, German researchers have managed.</h4>
                        </div>
                        <div class="welcome-btn">
                            <a href="<?php echo site_url('site/login')?>" class="gradient-btn v2 mr-20 mb-2">Register for the ICO</a>
                            <a href="#" class="gradient-btn v2">Download Whitepaper</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="welcome-img">
                        <img src="<?php echo base_url();?>axxets/templates/cyptian/img/welcome-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--welcome area end-->

    <!--about area start-->
    <div class="about-area wow fadeInUp" id="about">
        <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h5>We are featured in</h5>
                    </div>
                    <div class="space-30"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel owl-carousel text-center">
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/c-logo-1.png" alt="">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/c-logo-2.png" alt="">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/c-logo-3.png" alt="">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/c-logo-4.png" alt="">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/c-logo-5.png" alt="">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/c-logo-3.png" alt="">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/c-logo-2.png" alt="">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/c-logo-5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-90" id="mission"></div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="about-mid-img">
                        <img src="<?php echo base_url();?>axxets/templates/cyptian/img/about-left.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 align-self-center">
                    <div class="heading">
                        <h5>We are featured in</h5>
                    </div>
                    <div class="about-mid-text">
                        <h1>A Platform for Exchange 
                        Cyrptocurrency and shares</h1>
                        <div class="space-10"></div>
                        <p>Mauna Loa, the biggest volcano on Earth  half the Island of Hawaii. Just 35 miles to the northeast, Mauna Kea, known to native Hawaiians as Mauna a Wakea, rises nearly 14,000 feet above sea level.  If they are so close together, how did they develop in two parallel tracks .Sifting through teaspoons of clay and sand scraped from the floors of caves.</p>
                    </div>
                    <div class="space-30"></div>
                    <a href="#" class="gradient-btn v2 about-btn"> <i class="fa fa-send-o"></i> join us on telegraph</a>
                </div>
            </div>
        </div>
        <div class="space-90"></div>
    </div>
    <!--about area end-->

    <!--single about area start-->
    <div class="single-about-area wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/about-icon-1.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Exciting Opportunity</h4>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not quite tuned in radio station rises and for a while drowns</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/about-icon-2.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Vetted ICO Marketplace</h4>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not quite tuned in radio station rises and for a while drowns</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/about-icon-3.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Diverse Profit Ways</h4>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not quite tuned in radio station rises and for a while drowns</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="space-90"></div>
    </div>
    <!--single about area end-->

    <!--ico area start-->
    <div class="section-padding wow fadeInUp ico-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="ico-heading">
                        <h1><a href= "#">ICO</a> Live Now</h1>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="single-ico">
                        <h5>Token Sold: 126,419,796</h5>
                        <h5>1 ETH = 235 ICoin</h5>
                        <a href="#">10 % Bonus</a>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="single-ico">
                        <h5><a href="#">ETH</a>collected 90252</h5>
                        <h5><a href="#">BTC</a> collected 90152</h5>
                        <h5><a href="#">LTH</a>collected 5052</h5>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-ico">
                        <h5>Sale Ends in :</h5>
                       <div class="row">
                           <div class="col">
                               <span id="days"></span>
                               <h5>days</h5>
                           </div>
                           <div class="col">
                               <span id="hours"></span>
                               <h5>hours</h5>
                           </div>
                           <div class="col">
                               <span id="minutes"></span>
                                <h5>minutes</h5>
                           </div>
                           <div class="col">
                               <span id="seconds"></span>
                               <h5>seconds</h5>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="custom-progressBar">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                <div class="progress-details">
                                    <p>$ 38 M</p>
                                    <div class="progress-d-top"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="single-cup">
                                <p>Soft Cap</p>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <div class="single-cup right">
                                <p>max Cap</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="#" class="gradient-btn v2">Buy Tokens</a>
                </div>
            </div>
        </div>
    </div>
    <!--ico area end-->

    <!--Documentation area start-->
    <div class="section-padding documentation-area wow fadeInUp" id="Paper">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h5>Whitepaper</h5>
                        <div class="space-10"></div>
                        <h1>Download Documentation</h1>
                    </div>
                    <div class="space-60"></div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/flag-1.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>English</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/flag-2.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>Spanish</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/flag-3.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>Russian</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/flag-4.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>Arabic</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/flag-5.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>Portuguese</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Documentation area end-->
    
    <!--distibution-bg start-->
    <div class="distibution-bg">
        <!---distibution area start-->
        <div class="distibution wow fadeInUp" id="token">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                    <div class="heading">
                        <h5>Token Distribution</h5>
                        <div class="space-10"></div>
                        <h1>initial distibution</h1>
                    </div>
                    <div class="space-60"></div>
                </div>
                </div>
                <div class="row">
                    
                    <div class="col-6 text-right">
                        <div class="distibution-svg distibution-svg-1">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/token-top.png" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="distibution-d item-1">
                            <ul>
                                <li class="distibution-list-1"><span>15% </span>Build Up Team</li>
                                <li class="distibution-list-2"><span>50% </span>ICO Investors</li>
                                <li class="distibution-list-3"><span>25% </span>Branding & Marketing</li>
                                <li class="distibution-list-4"><span>10% </span>Bounty </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="space-90"></div>
                <!-- <div class="row">
                    <div class="col-12 text-center">
                    <div class="heading">
                        <h5>Sale breakdown</h5>
                        <div class="space-10"></div>
                        <h1>Token Sales Contribution</h1>
                    </div>
                    <div class="space-90"></div>
                </div>
                </div>
                <div class="row .d-sm-none .d-md-block">
                    <div class="col-2 text-right">
                        <div class="distibution-d distibution-d-2">
                            <ul>
                                <li class="distibution-list-5"><span>40% </span>HR & Development</li>
                                <li class="distibution-list-6"><span>30% </span>Branding & Markting</li>
                                <li class="distibution-list-7"><span>20% </span>Posiblle Buyout</li>
                                <li class="distibution-list-8"><span>10% </span>Legal Advisory </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-10 " >
                        <div class="distibution-svg distibution-svg-2">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/token-bottom.png" alt="">
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="space-90"></div>
        </div>
        <!---distibution area end-->
    </div>
    <!--distibution-bg end-->

    <!--roadmap area start-->
    <div class="roadmap-area section-padding wow fadeInUp" id="roadmap">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h5>history Timeline</h5>
                        <div class="space-10"></div>
                        <h1>Development Roadmap</h1>
                    </div>
                    <div class="space-60 d-none d-sm-block"></div>
                </div>
            </div>
            
        </div>
        <div class="container">
            <div class="roadmap-carousel owl-carousel">
                <div class="roadmap-item">
                    <div class="single-roadmap text-center road-left">
                        <div class="single-roadmap-img">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/roadmap-1.png" alt="">
                        </div>
                        <div class="space-30"></div>
                        <div class="roadmap-text">
                            <p>01.03.2017</p>
                            <div class="space-10"></div>
                            <h5>Concept and whitepaper</h5>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item align-self-center">
                    <div class="single-roadmap road-right">
                        <div class="row">
                            <div class="col-5 align-self-center">
                                <div class="single-roadmap-img">
                                    <img src="<?php echo base_url();?>axxets/templates/cyptian/img/roadmap-2.png" alt="">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="roadmap-text">
                                    <p>21.06 .2017</p>
                                    <h5>Recruitment of Our team</h5>
                                    <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item">
                    <div class="single-roadmap text-center road-left">
                        <div class="single-roadmap-img">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/roadmap-4.png" alt="">
                        </div>
                        <div class="space-30"></div>
                        <div class="roadmap-text">
                            <p>31.08.2017</p>
                            <div class="space-10"></div>
                            <h5>Core Development</h5>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item align-self-center">
                    <div class="single-roadmap road-right">
                        <div class="row">
                            <div class="col-5 align-self-center">
                                <div class="single-roadmap-img">
                                    <img src="<?php echo base_url();?>axxets/templates/cyptian/img/roadmap-5.png" alt="">
                                </div>
                        
                            </div>
                            <div class="col-7">
                                <div class="roadmap-text">
                                    <p>31.11.2017</p>
                                    <h5>Main Development</h5>
                                    <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item">
                    <div class="single-roadmap text-center road-left">
                        <div class="single-roadmap-img">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/roadmap-4.png" alt="">
                        </div>
                        <div class="space-30"></div>
                        <div class="roadmap-text">
                            <p>31.08.2017</p>
                            <div class="space-10"></div>
                            <h5>Core Development</h5>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item align-self-center">
                    <div class="single-roadmap road-right">
                        <div class="row">
                            <div class="col-5 align-self-center">
                                <div class="single-roadmap-img">
                                    <img src="<?php echo base_url();?>axxets/templates/cyptian/img/roadmap-5.png" alt="">
                                </div>
                        
                            </div>
                            <div class="col-7">
                                <div class="roadmap-text">
                                    <p>31.11.2017</p>
                                    <h5>Main Development</h5>
                                    <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--roadmap area end-->

    <!--team-bg-->
    <div class="team-bg">
        <!--team area start-->
        <div class="team-area wow fadeInUp section-padding" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="heading">
                            <h5>core team</h5>
                            <div class="space-10"></div>
                            <h1>Our Superman</h1>
                        </div>
                        <div class="space-60"></div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/superman-1.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>William Delisle</h3>
                                <div class="space-10"></div>
                                <h6>FOUNDER & CEO</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/superman-2.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Julius Book</h3>
                                <div class="space-10"></div>
                                <h6>SOFTWARE ENGINEER</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/superman-6.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Jessica Blair</h3>
                                <div class="space-10"></div>
                                <h6>MARKETING ANALYST</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/superman-7.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Nancy Burns</h3>
                                <div class="space-10"></div>
                                <h6>Head of Design</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-area team wow fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="heading">
                            <h5>Advisory  team</h5>
                            <div class="space-10"></div>
                            <h1>Advisory Board</h1>
                        </div>
                        <div class="space-60"></div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/superman-4.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Tricia Morgan</h3>
                                <div class="space-10"></div>
                                <h6>ADVISOR</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/superman-5.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Kent Ransom</h3>
                                <div class="space-10"></div>
                                <h6>ADVISOR</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/superman-6.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Edward Schultz</h3>
                                <div class="space-10"></div>
                                <h6>ADVISOR</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?php echo base_url();?>axxets/templates/cyptian/img/superman-7.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Betty Cyr</h3>
                                <div class="space-10"></div>
                                <h6>ADVISOR</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-30"></div>
        </div>
        <!--team area end-->

        <!--apps area start-->
        <div class="apps-area wow fadeInUp section-padding" id="apps">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 offset-1 align-self-center">
                        <div class="heading">
                            <h5>MOBILE APP</h5>
                            <div class="space-10"></div>
                            <h1>Track from Anywhere</h1>
                            <div class="space-20"></div>
                            <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves  but every day, they construct one or more spacious houses that can exceed . </p>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not-quite-tuned-in radio station rises and for a while drowns out the patter.</p>
                        </div>
                        <div class="space-30"></div>
                        <a href="#" class="gradient-btn apps-btn ml-2"> <i class="zmdi zmdi-google-play"></i>Google Playstore</a>

                        <a href="#" class="gradient-btn apps-btn apps-btn-2 mt-2"> <i class="zmdi zmdi-apple"></i>Apple Appstore</a>
                    </div>
                    <div class="col-12 col-lg-5 offset-1 mt-2">
                        <div class="apps-img">
                            <img src="<?php echo base_url();?>axxets/templates/cyptian/img/Mobile.png" alt="" style="width: 70%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--apps area end-->

        <!--faq area start-->
        
        <!--faq area end-->
    </div>
    <!--team bg area end-->

     <!-- Contact-Area -->
    <section class="section-padding" id="contact">
        <div class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title" >
                            <h2 class="bar-title " style="margin-bottom: 20px ">Contact Now</h2>
                            <div class="alert-custom" role="alert" style="color:blue;" ><?php if(isset($success)){ echo $success;} ?> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="contact-form">
                            <form method="post" action="#">
                                <div>
                                    <input style="margin-bottom:2% ; border:1px solid white " type="text" id="form-name" name="form-name" placeholder="Full Name" required="required" >
                                    <input style="margin-bottom:2% ; border:1px solid white " type="number" placeholder="Phone Number" name="phone">
                                </div>
                                <div class="form-double">
                                    <input style="margin-bottom:2% ; border:1px solid white " type="email" name="form-email" name="email" id="form-email" placeholder="Your Email" required="required">
                                    <input style="margin-bottom:2% ; border:1px solid white " type="text" name="form-subject" id="form-subject" placeholder="Subject" required="required">
                                </div>
                                <textarea style="margin-bottom:2% ; border:1px solid white " name="form-message" id="message" name="form-message" rows="5" required="required" placeholder="Message"></textarea>
                               <!-- <button class="bttn bttn-primary" type="submit" name="submit">Send Now</button>-->
                               <input type="submit"  style="margin-bottom:2% ; border:1px solid white " name="submit" class="btn btn-info" value="Submit Now ">
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="contact-info">
                            <ul class="info">
                                <li style="font-weight: 500">
                                    <span class="info-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </span> <?php echo config_item('company_name'); ?> <br /> <?php echo config_item('company_address'); ?>
                                </li>
                                <br>
                                <li style="font-weight: 500">
                                    <span class="info-icon">
                                        <i class="fa fa-phone"></i>
                                    </span> <?php echo config_item('phone'); ?>
                                </li>
                                 <br>
                                <li style="font-weight: 500">
                                    <span class="info-icon">
                                        <i class="fa fa-envelope"></i>
                                    </span><?php echo config_item('email'); ?>
                                </li>
                                 <br>
                            </ul>
                             <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i style = "margin-left: 14px " class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i style = "margin-left: 14px " class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i style = "margin-left: 14px " class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-Area / -->

   

    <!--footer area start-->
    <div class="footera-area section-padding wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer">
                        <div class="logo-area footer">
                            <a href="#"><img src="<?php echo base_url();?>axxets/templates/cyptian/img/logo-top.png" alt=""></a>
                        </div>
                        <div class="space-20"></div>
                        <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. </p>
                        <div class="space-10"></div>
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://globalmlmsolution.com/" target="_blank"><?php echo config_item('company_name').' ' ?></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <div class="single-footer">
                        <ul>
                            <li><a href="#about">About</a></li>
                            <li><a href="#token">Token Sale</a></li>
                            <li><a href="#roadmap">Roadmap</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="single-footer">
                        <ul>
                            <li><a href="#Paper">White Paper</a></li>
                            <li><a href="#team">Team</a></li>
                            <li><a href="#apps">APP</a></li>
                            <li><a href="#faq">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer">
                        <p>Subscribe to our Newsletter</p>
                        <div class="space-20"></div>
                        <div class="footer-form">
                            <form action="#">
                                <input type="email" placeholder="Email Address">
                                <a href="" class="gradient-btn subscribe">GO</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer area end-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/main.js"></script>
    <!-- jquery 2.2.4 js-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/jquery-2.2.4.min.js"></script>
    <!-- popper js-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/popper.js"></script>
    <!-- carousel js-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/owl.carousel.min.js"></script>
    <!-- wow js-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/wow.min.js"></script>
    <!-- bootstrap js-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/bootstrap.min.js"></script>\
    <!--skroller js-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/skrollr.min.js"></script>
    <!--mobile menu js-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/jquery.slicknav.min.js"></script>
    <!--particle s-->
    <script src="<?php echo base_url();?>axxets/templates/cyptian/js/particles.min.js"></script>
    <!-- main js-->
    
  </body>
</html>