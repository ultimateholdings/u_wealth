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
<html>
<head>
	<title><?php echo config_item('company_name') ?></title>
	<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
 <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/3/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>axxets/templates/3/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/3/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/3/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/3/css/passive.css">
  <style>
  .table:hover{
	box-shadow:10px 10px 28px -1px rgba(0,0,0,0.75)

} 
.bttn {
    display: inline-block;
    position: relative;
    padding: 10px 30px;
    color: #ffffff;
	border-radius: 100px;
	transition: 0.3s;
	overflow: hidden;
	background-color:#bdbdbd;	
	box-shadow: 0 2px 0 0 rgba(189, 189, 189, 0.5), 0 4px 0 0 rgba(189, 189, 189, 0.5);
	 transform: translateY(0);
    border: none;
}
.col-sm-6 {
    width: 50%;
    float: left;
}
count-box, .feature-box {
    padding: 30px;
    box-shadow: 0 0 0 0 rgba(31, 69, 113, 0.4);
	margin-bottom: 30px;
	border-radius: 5px;
	background-color:#ffffff;
    transition: 0.3s;
}
.feature-box .box-icon {
    float: left;
    margin-right: 20px;
    width: 40px;
    height: 40px;
    font-size: 30px;
    background: -webkit-linear-gradient(#a1c4fd, #c2e9fb);
    -webkit-background-clip: text;
    -webkit-text-fill-color:  transparent;
}
.icofont {
    font-family: 'IcoFont' !important;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
}
.fa:hover{
	color:blue;
}
img {vertical-align: middle;}
.carousel-indicators li{
	display:inline-block;
	width:10px;
	height:10px;
	margin:1px;
	text-indent:-999px;
	cursor:pointer;
	background-color:#000\9;
	background-color:rgba(0,0,0,0);
	border:1px solid #fff;
	border-radius:10px;
}
.carousel-indicators .active{
	width:12px;
	height:12px;
	margin:0;
	background-color:#fff;
}
</style>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</head>
<body>
<header id="mainheader">
	<div class="container clearfix menu_container">
		<nav id="top-menu-nav" class="navbar fixed-top navbar-light navbar-expand-lg">
			<a class="navbar-brand mr-auto" href="#">
			<img id="logo" class="img-fluid" style="height:40px;" src="<?php echo base_url();?>axxets/templates/3/images/logo2.png">
			</a>	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapse_Navbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item" style="color: white;">
					<a href="#" class="nav-link" style="color: white;">Home</a>
				</li>
				<li class="nav-item">
					<a href="#about-area" class="nav-link" style="color: white;">About Us</a>
				</li>
				<li class="nav-item"><a target="_blank" href="<?php echo base_url();?>axxets/templates/3/images/business_plan.pdf" class="nav-link"  style="color:white;">BUSINESS PLAN</a></li>
				<li class="nav-item"><a href="#tst" class="nav-link" style="color: white;">TESTIMONIAL</a></li>
				<li class="nav-item"><a href="#contact" class="nav-link" style="color: white;">CONTACT</a></li>
				<li><a target="_blank" href="<?php echo site_url('site/login')?>" class="nav-link" style="color: white;">MEMBER LOGIN</a></li>
				<li><a target="_blank" href="<?php echo site_url('site/register')?>" class="nav-link" style="color: white;">REGISTER</a></li>
			</ul>
		</div>
		</nav>								
	</div>										
</header>
<section class="slides">
	<div id="demo" class="carousel slide" data-ride="carousel">
 	 	<ul class="carousel-indicators">
	   		<li data-target="#demo" data-slide-to="0" class="active"></li>
	    	<li data-target="#demo" data-slide-to="1"></li>
  		</ul>
  	 	<div class="carousel-inner">
			<div class="carousel-item active">
				<img  class="img-fluid" src="<?php echo base_url();?>axxets/templates/3/images/slider1.jpg"; alt="first slide" style="width:100vw;">
				<div class="carousel-caption">
					<h3>MCS Offers Affordable IT, Software & Business Services</h3>
					<!--<p>Our deep expertise in retail, manufacturing, health, entertainment, Education, Banking & Financial services have helped companies realize exponential benefits.</p>-->
				</div>
			</div>
    		<div class="carousel-item">
     		 <img class="img-fluid" src="<?php echo base_url();?>axxets/templates/3/images/slider2.jpg"; alt="Third slide">
 		  		<div class="carousel-caption">
		          	<h3 style="text-align:center;font-weight: bold;">Mayura Consultancy Services have helped companies realize exponential benefit</h3>
		          <!--	<p style="font-size: large;font-weight: bold;text-align:center;">Our ready made software products such as eCommerce marketplace, ERP, CRM, POS, MLM, Cashback etc… help client business to automate and grow at 10x.</p>-->
	       		</div>
    		</div>
 		</div>
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		</a>
	</div>
</section>
<br></br>
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
                    <img src="<?php echo base_url();?>axxets/templates/3/images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
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
<section class="plans" id="plans">
	<div class="heading" style="padding: 40px;">
		<h2 style="text-align: center;color:black">Joining Fee</h2><br>
		<p style="text-align:center;">There are many variations of plans available.</p>
		<!--iv style="text-align: center;color: white">The success story of Scalia. In facts & numbers.</div>-->
		<div class="pricing content" style="padding: 50px;">
			<div class="row">
				<div class="col-xs-6 col-md-3 wow fadeInLeft" data-wow-delay="0.2s">
					<div class="table" style=" background-color:#fcfcfc;text-align: center;">		
						<div class="heading" style="margin-bottom: 17px;padding:10px 0;">
							<h4 style="color:black;font-weight: bold;">Basic</h4>
							<h3 class="amount"><?php echo config_item('currency') . '1,000';?></h3>
						</div>		
						<div class="content" style="font-weight: bold;">
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">Lifetime Membership</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="position: relative;color: #898989;">1% Referral Commission</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">1% Sales Commission</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">Dedicated Useable Account</span>
							</div>	
						</div>
							<a target="_blank" href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 col-12">
					<div class="table" style="background-color: #fcfcfc;text-align: center;">		
						<div class="heading" style="margin-bottom: 17px;padding:10px 0;">
							<h4 style="color:black;font-weight: bold;">Premium</h4>
							<h3 class="amount"><?php echo config_item('currency') . '5,000';?></h3>
						</div>
					<div class="content" style="font-weight: bold;">
						<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
							<span style="color: #898989;">Lifetime Membership</span>
						</div>
						<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
							<span style="position: relative;color: #898989;">6% Referral Commission</span>
						</div>
						<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
							<span style="color: #898989;">6% Sales Commission</span>
						</div>
						<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
							<span style="color: #898989;">Dedicated Useable Account</span>
						</div>	
						</div>
						<a target="_blank" href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 col-12">
					<div class="table" style=" background-color: #fcfcfc;text-align: center;">				
						<div class="heading" style="margin-bottom: 17px;padding:10px 0;">
							<h4 style="color:black;font-weight: bold;">Business</h4>
							<h3 class="amount"><?php echo config_item('currency') . '10,000';?></h3>
						</div>
						<div class="content" style="font-weight: bold;">
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">Lifetime Membership</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="position: relative;color: #898989;">14% Referral Commission</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">14% Sales Commission</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">Dedicated Useable Account</span>
							</div>	
						</div>
						<a target="_blank" href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 col-12">
					<div class="table" style="background-color: #fcfcfc;text-align: center;">				
						<div class="heading" style="margin-bottom: 17px;padding:10px 0;">
							<h4 style="color:black;font-weight: bold;">Ultimate</h4>
							<h3 class="amount"><?php echo config_item('currency') . '10,000';?></h3>
						</div>
						<div class="content" style="font-weight: bold;">
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">Lifetime Membership</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="position: relative;color: #898989;">14% Referral Commission</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">14% Sales Commission</span>
							</div>
							<div style="position: relative;padding: 0 0 1.6em 14px;color: #666;">
								<span style="color: #898989;">Dedicated Useable Account</span>
							</div>	
						</div>
						<a target="_blank" href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="testimonial-area section-padding" id="tst" style="text-align:center;">
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-center m-auto">
				<h2 style="text-align:center;">Testimonials</h2>
				<div id="Carousel" class="carousel slide" data-ride="carousel">
					<!-- Carousel indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>   
					<!-- Wrapper for carousel items -->
					<div class="carousel-inner">
						<div class="item carousel-item active">
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/3/images/1.png" alt="" style="image-rendering:center;"></div>
							<p class="testimonial" style="color:black;"><a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential...</a></p>
							<div>
								<span class="overview"><b>Arundathi Nair</b>,</span>
								<span style="color: #7e5738;font-weight: bold;">JANUARY 01,2020</span>
							</div>
						</div>
						<div class="item carousel-item">
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/3/images/2.png" alt=""></div>
							<p class="testimonial"><a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential...</a></p>
							<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
						</div>
						<div class="item carousel-item">
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/3/images/1.png" alt=""></div>
							<p class="testimonial"><a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential..
							</a></p>
							<p class="overview"><b>Michael Holz</b>, Seo Analyst</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br></br>
<section class="contact now"  id="contact" style="background-color:#eaeaea;padding:10px;">
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
                        <div class="form-double">
                            <input type="text" id="form-name" name="form-name" placeholder="Full Name" required="required" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
                            <input type="number" placeholder="Phone Number" name="phone" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
                        </div>
                        <div class="form-double">
                            <input type="email" name="form-email" name="email" id="form-email" placeholder="Your Email" required="required" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
          
                            <input type="text" name="form-subject" id="form-subject" placeholder="Subject" required="required" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
                        </div>
                        <textarea name="form-message" id="message" name="form-message" rows="5" required="required" placeholder="Message" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;"></textarea>
                        <input type="submit" name="submit" class="bttn bttn-primary" value="Submit Now ">
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="contact-info" style="color: #495057;">
                    <p><span class="info-icon">
             			<i class="icofont icofont-social-google-map"></i>
                    </span><?php echo config_item('company_name'); ?> <br /><?php echo config_item('company_address'); ?></p>
                    <p><span class="info-icon">
                        <i class="fa fa-phone"></i>
                    </span><?php echo config_item('phone'); ?></p>
                    <p><span class="info-icon">
                        <i class="fa fa-envelope"></i>
                    </span><?php echo config_item('email'); ?></p>
                    <div class="social-menu-2" style="font-size: 30px;" >
                        <a href="#" class="fa fa-twitter" style="color: #495057;"></a>
                        <a href="#"><i class="fa fa-facebook" style="color: #495057;"></i></a>
                        <a href="#"><i class="fa fa-instagram" style="color: #495057;"></i></a>
                        <a href="#"><i class="fa fa-skype" style="color: #495057;"></i></a>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<footer style="background-color: black;">
	<div style="background-color:#222;height:80px;">
		<div style="padding: 20px;">
			<p style="color: white;margin-left: 40px;margin-top: 10px;"><?php echo config_item('company_name') ?>
			<span style="float:right;"><a class="icon fb" href="#"><i class="fa fa-facebook">&nbsp;</i></a>
			<a class="icon tw" href="#"><i class="fa fa-twitter">&nbsp;</i></a>
			<a class="icon pin" href="#"><i class="fa fa-pinterest">&nbsp;</i></a>
			<a class="icon db" href="#"><i class="fa fa-dribbble">&nbsp;</i></a>
			<a class="icon gp" href="#"><i class="fa fa-google-plus">&nbsp;</i></a></span>
			</p>
		</div>
	</div>
</footer>
<script>
$(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll < 300){
            $('.fixed-top').css('background', 'transparent');

        } else{
            $('.fixed-top').css('background', '#00000066');
        }
    });
</script>
</body>
</html>