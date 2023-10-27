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
  <meta charset="utf-8">
  <title><?php echo config_item('company_name') ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="<?php echo base_url();?>axxets/idle/cont/images/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="<?php echo base_url();?>axxets/idle/cont/css/css.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/cont/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/cont/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/cont/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/cont/css/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/cont/css/lightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>axxets/idle/cont/css/style.css" rel="stylesheet">
</head>
<body>
 <!-- <?php 
$active='contact';
  include_once('top/header.php'); ?>-->
<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
        <a href="https://idlemoney.in/web/index.php">
          <img src="<?php echo base_url();?>axxets/idle/cont/images/logo.png" class="img img-responsive" style="max-height: 40px"></a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
          <li><a href="<?php echo site_url('site/custom/idle/index')?>">Home</a></li>
          <li><a href="<?php echo site_url('site/custom/idle/about')?>">About Us</a></li>
          <li class="menu-active"><a href="<?php echo site_url('site/custom/idle/contact')?>">Contact</a></li>
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
          <div class="carousel-background"><img src="<?php echo base_url();?>axxets/idle/cont/images/1.jpg" ></div>
          <div class="carousel-container" style="max-height: 340px">
            <div class="section-header">
              <h3 style="color: #FFFFFF">Contact Us</h3>
              <div class="alert-custom" role="alert" style="color:blue;" >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- #intro -->
<section id="contact" class="section-bg wow fadeInUp">
  <div class="container">
    <div class="row contact-info">
      <div class="col-md-4">
        <div class="contact-address">
          <i class="fa fa-address-card-o" style="font-size:48px;color:red"></i>
          <h3>Address</h3>
          <address><?php echo config_item('company_name'); ?> <br /><?php echo config_item('company_address'); ?></address>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-phone">
          <i class="fa fa-phone" style="font-size:48px;color:red"></i>
          <h3>Phone Number</h3>
          <p><?php echo config_item('phone'); ?></p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-email">
          <i class="fa fa-envelope-o" style="font-size:48px;color:red"></i>
          <h3>Email</h3>
          <p><?php echo config_item('email'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="contact"  id="contact" style="background-color:#eaeaea;padding:10px;">
  <div class="content" style="padding:20px;">
    <div class="row">
      <div class="col-xs-12">
          <div class="page-title">
              <h3 class="bar-title" style="color: #495057;">Contact Now</h3>
              <div class="alert-custom" role="alert" style="color:blue;" ><?php if(isset($success)){ echo $success;} ?> </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-8">
        <div class="contact-form">
          <form method="post" action="#">
            <div class="form">
                <input type="text" id="form-name" name="form-name" placeholder="Full Name" required="required" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
                <input type="number" placeholder="Phone Number" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
            </div>
            <div class="form-double">
                <input type="email" name="form-email" name="email" id="form-email" placeholder="Your Email" required="required" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
                <input type="text" name="form-subject" id="form-subject" placeholder="Subject" required="required" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
            </div>
            <textarea name="form-message" id="message" id="form-message" rows="5" required="required" placeholder="Message" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;"></textarea>
             <input type="submit" name="submit" class="btn btn-primary" value="Submit Now" style="background: grey;">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--  <?php include_once('top/footer.php'); ?>-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-info">
            <img src="<?php echo base_url();?>axxets/idle/cont/images/logo.png" style="max-height: 80px; width: 80%">
            <br>
            <br>
            <p>IDEAL MONEY combines the best of crowdsourcing, bringing together various individuals who commit money to projects and companies they want to support. It’s a young and quickly growing market and it's transforming how people behave with their money. </p>
          </div>  
          <div class="col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i><a href="<?php echo site_url("site/custom/idle/index");?>">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i><a href="<?php echo site_url('site/custom/idle/contact')?>">Contact Us</a></li>
              <li><i class="ion-ios-arrow-right"></i><a href="<?php echo site_url('site/custom/idle/about')?>">About Us</a></li>
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
              <a href="https://idlemoney.in/web/contact.php#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://idlemoney.in/web/contact.php#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://idlemoney.in/web/contact.php#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://idlemoney.in/web/contact.php#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="https://idlemoney.in/web/contact.php#" class="linkedin"><i class="fa fa-linkedin"></i></a>
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
  </footer><!-- #footer -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/easing.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/hoverIntent.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/superfish.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/wow.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/waypoints.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/counterup.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/lightbox.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/jquery.touchSwipe.min.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/contactform.js"></script>
  <script src="<?php echo base_url();?>axxets/idle/cont/js/main.js"></script>
</body>
</html>
