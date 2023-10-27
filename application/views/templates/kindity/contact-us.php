<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/kindity/css/bootstrap.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/kindity/css/font-awesome.min.css">
  	<style type="text/css">
  		body{
  			overflow-x: hidden;
  		}
      li{
        display: inline-block;
      }
      .input{
        width: 150px;
      }
      @media screen and (max-width: 600px) {
      .input{
       width: 370px;
      }
      }
  	</style>
</head>
<body>
<?php include 'header.php' ?>

<section>
  <div class="card bg-dark text-white">
  <img src="<?php echo base_url();?>axxets/templates/kindity/img/banner/home-banner.jpg" class="card-img" alt="..." style="height: 450px;">
  <div class="card-img-overlay">
    <div class="text-center">
    <h2 style="margin-top: 10%;">Contact US</h2>
  </div>          
  </div>
</div>
</section>
	<div>
		<div class="container"  style="margin-top: 5%">
		<iframe src="<?php echo config_item('google_map'); ?>" width="1100" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" ></iframe>
		</div>
	</div>

	<div class="container" style="margin-top: 5%; margin-bottom: 15%" >
		<div class="row">
			<div class="col-lg-3" style="color: rgb(233, 31, 108)">
          <div class="contact_info">
            <div class="info_item">
                <i class="fas fa-home"></i>
                <h6>California, United States</h6>
                <p>Santa monica bullevard</p>
            </div>
            <div class="info_item">
                <i class="fas fa-phone-alt"></i>
                <h6><a href="#">00 (440) 9865 562</a></h6>
                <p>Mon to Fri 9am to 6 pm</p>
            </div>
            <div class="info_item">
                <i class="fas fa-envelope"></i>
                <h6><a href="#">support@colorlib.com</a></h6>
                <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>

           <div class="col-lg-9">
                        <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" style="height: 150px;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-danger">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
		</div>
	</div>

<!-- Footer -->
<footer class="page-footer font-small bg-dark">
  <div class="container text-center text-md-left">
    <div class="row">
       <div class="col-md-3 mx-auto" style="color: gray;margin-top: 12%">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">ABOUT AGENCY</h5>
		 <p>The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point </p>
	   </div>

      <hr class="clearfix w-100 d-md-none">

      	<div class="col-md-3 mx-auto" style="margin-top: 12%;">
       		 <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">NAVIGATION LINKS</h5>
        		<div class="row">
                    <div class="col-4">
                        <ul class="list">
                            <li><a href="#" style="color: gray">Home</a></li>
                            <li><a href="#" style="color: gray">Feature</a></li>
                            <li><a href="#" style="color: gray">Services</a></li>
                            <li><a href="#" style="color: gray">Portfolio</a></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="list">
                            <li><a href="#" style="color: gray">Team</a></li>
                            <li><a href="#" style="color: gray">Pricing</a></li>
                            <li><a href="#" style="color: gray">Blog</a></li>
                            <li><a href="#" style="color: gray">Contact</a></li>
                        </ul>
                    </div>										
                </div>		
        </div>

      <hr class="clearfix w-100 d-md-none">
        <div class="col-md-3 mx-auto" style="margin-top: 12%;">
			<h5 class="font-weight-bold text-uppercase mt-3 mb-4"style="color: white;">NEWSLETTER</h5>
			<p style="color: gray;">For business professionals caught between high OEM price and mediocre print and graphic output, </p>
        		<div class="input-group d-flex flex-row">
                    <input class="input" name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                    <button type="button" class="btn btn-primary" style="height: 40px;">Submit</button>	
                </div>
        </div>

      <hr class="clearfix w-100 d-md-none">
      	<div class="col-md-3 mx-auto"style="margin-top: 12%;">
       		 <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="color: white;">FOLLOW US</h5>

       		 <li ><a href="" style="font-size: 40px;"><i class="fab fa-facebook"></i></a></li>
       		 <li style="margin-left: 20px;"><a href="" style="font-size: 40px;"><i class="fab fa-twitter"></i></a></li>
       		 <li style="margin-left: 20px;"><a href="" style="font-size: 40px;"><i class="fab fa-instagram"></i></a></li>
       		 <li style="margin-left: 20px;"><a href="" style="font-size: 40px;"><i class="fab fa-behance"></i></a></li>
		</div>
  		<div class="container">
  			<hr style="background: white;">
  		</div>
  		<!-- Copyright -->
  		<div class="footer-copyright text-center py-3" style="color: white;margin-left: 45%">© 2020 Copyright:
  		</div>
 		 <!-- Copyright -->
 	</div>
 </div>
</footer>
<!-- Footer -->
<script src="<?php echo base_url();?>axxets/templates/kindity/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>axxets/templates/kindity/js/popper.min.js"></script>
<script src="<?php echo base_url();?>axxets/templates/kindity/js/bootstrap.min.js"></script>

</body>
</html>