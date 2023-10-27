<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title><?php echo config_item('company_name') ?></title>
   <title>Donate India </title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="icon" href="<?php echo base_url();?>axxets/templates/donate/images/favicon.ico" type="image/x-icon">
   <link  href="<?php echo base_url();?>axxets/templates/donate/css/bootstrap.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/donate/css/font-awesome.css">
   <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/donate/css/elegant-fonts.css">
   <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/donate/css/themify-icons.css">
   <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/donate/css/swiper.css">
   <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/donate/css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

  

<body class="single-page contact-page">
  <?php include 'header.php' ?>

  <div class="page-header">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <h1>Contact</h1>
              </div>
          </div>
      </div>
  </div>
  <div class="contact-page-wrap">
    <div class="container">
      <div class="row">
          <div class="col-12 col-lg-5">
              <div class="entry-content">
                  <h2>Get In touch with us</h2>
                  <p><?php echo config_item('about_us') ?></p>
                  <ul class="contact-social d-flex flex-wrap align-items-center">
                      <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>

                  <ul class="contact-info p-0">
                      <li><i class="fa fa-phone"></i><span><?php echo config_item('phone'); ?></span></li>
                      <li><i class="fa fa-envelope"></i><span><?php echo config_item('email'); ?></span></li>
                      <li><i class="fa fa-map-marker"></i><span><?php echo config_item('company_address'); ?></span></li>
                  </ul>
              </div>
          </div>

          <div class="col-12 col-lg-7">
              <form class="contact-form">
                  <input type="text" placeholder="Name">
                  <input type="email" placeholder="Email">
                  <textarea rows="15" cols="6" placeholder="Messages"></textarea>

                  <span>
                      <input class="btn gradient-bg" type="submit" value="Contact us">
                  </span>
              </form>

          </div>

          <div class="col-12">
              <div class="contact-gmap">
                  <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=usa&key=AIzaSyC2LvnNLzWxHgFm_XfpFG9wHUuyEj6rXSs" allowfullscreen></iframe>
              </div>
          </div>
      </div>
    </div>
  </div>
 <?php include 'footer.php' ?> 
  <script type="text/javascript" src="<?php echo base_url();?>axxets/templates/donate/js/jquery_004.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>axxets/templates/donate/js/jquery_003.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>axxets/templates/donate/js/swiper.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>axxets/templates/donate/js/jquery_005.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>axxets/templates/donate/js/circle-progress.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>axxets/templates/donate/js/jquery_002.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>axxets/templates/donate/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>axxets/templates/donate/js/custom.js"></script>
</body>
</html>

