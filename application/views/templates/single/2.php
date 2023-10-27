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

?><!DOCTYPE html>
<html>
<head>
	<title><?php echo config_item('company_name') ?></title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/2/css/bootstrap.min.css">
  	<script src="<?php echo base_url();?>axxets/templates/2/js/jquery.min.js"></script>
  	<script src="<?php echo base_url();?>axxets/templates/2/js/popper.min.js"></script>
  	<script src="<?php echo base_url();?>axxets/templates/2/js/bootstrap.min.js"></script>
  	<!--<script src="<?php echo base_url();?>axxets/templates/2/js/owl.carousel.min.js"></script>-->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--	<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/2/css/owl.carousel.css">-->
<style>
.main{
background-image:url(<?php echo base_url();?>axxets/templates/2/images/gradient.jpg);
height:auto;
width: 100%;
background-position: top center;
background-repeat:no-repeat;
background-size: cover;
}
.icofont-social-google-map:before {
	content: "\ee10";
}

.btn :hover{
	background-color: #ffcc00;
	color: white;
}

.cntr {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.navbar-toggler-icon {
   background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(248,249,250, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");

}
.navbar-toggler { border-color: #008000; }
.col-center {
	margin: 0 auto;
	float: none !important;
}
.carousel {
	margin: 50px auto;
	padding: 0 70px;
}
.carousel .item {
	color: #999;
	font-size: 14px;
    text-align: center;
	overflow: hidden;
    min-height: 290px;
}
.carousel .item .img-box {
	width: 135px;
	height: 135px;
	margin: 0 auto;
	padding: 5px;
	border: 1px solid #ddd;
	border-radius: 50%;
}
.carousel .img-box img {
	width: 100%;
	height: 100%;
	display: block;
	border-radius: 50%;
}
.carousel .testimonial {
	padding: 30px 0 10px;
}
.carousel .overview {	
	font-style: italic;
}
.carousel .overview b {
	text-transform: uppercase;
	color: #7AA641;
}
.carousel .carousel-control {
	width: 40px;
    height: 40px;
    margin-top: -20px;
    top: 50%;
	background: none;
}
.carousel-control i {
    font-size: 68px;
	line-height: 42px;
    position: absolute;
    display: inline-block;
	color: rgba(0, 0, 0, 0.8);
    text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
}
.carousel .carousel-indicators {
	bottom: -40px;
}
/*.carousel-indicators li, .carousel-indicators li.active {
	width: 5px;
	height: 3px;
	margin: 1px 3px;
	border-radius: 50%;
}*/
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
.carousel-indicators li {	
	background: #999;
	border-color: transparent;
	box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}
.carousel-indicators li.active {	
	background: #555;		
	box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}
</style>
</head>
<body>
<header>
	<div class="mh">
		<div class="container">
			<div class="navbar fixed-top navbar-expand-lg navbar-light">
				<a class="navbar-brand mr-auto" href="#">
	      			<img class="img-fluid" src="<?php echo base_url();?>axxets/templates/2/images/logo2.png" style="width: 70%;">
	     		</a>
    			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
     				<span  class="navbar-toggler-icon"></span>
     			</button>
	      		<div class="collapse navbar-collapse" id="collapse_Navbar">
	       			<ul class="navbar-nav ml-auto">
	    				<li class="nav-item">
	          				<a class="nav-link" href="#" style="color:white;font-weight:bold;">Home</a>
	    				</li>
	    				<li class="nav-item">
	    					<a class="nav-link" href="#ab"  style="font-weight:bold;color:white;">About Us</a>
	    				</li>
	    				<li class="nav-item"><a target="_blank" href="<?php echo base_url();?>axxets/templates/2/images/business_plan.pdf" class="nav-link"  style="font-weight:bold;color:white;">Business Plan</a></li>
	    				<li class="nav-item">
	    					<a class="nav-link" href="#services"  style="font-weight:bold;color:white;">Services</a>
	    				</li>
	    				<li class="nav-item">
	    					<a class="nav-link" href="#tst"  style="font-weight:bold;color:white;">Testimonial</a>
	    				</li>
	    				<li class="nav-item">
	    					<a class="nav-link" href="#contact"  style="font-weight:bold;color:white;;">Contact</a>
	    				</li>
	    				<li><a target="_blank" href="<?php echo site_url('site/login')?>" class="nav-link" style="font-weight:bold;color: white;">Member Login</a></li>
						<li><a target="_blank" href="<?php echo site_url('site/register')?>" class="nav-link" style="font-weight:bold;color: white;">Register</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
<section class="main">
	<div class="m1" style="padding-top:150px;padding-bottom:150px;text-align:center;">
		<h2 style="color:#f8f9fb;text-align:center;">MCS Offers Affordable IT, Software & Business Services</h2>
		<div style="padding-right:30px;display: block;text-align:center;font-size:large;color:#f8f9fb;">
			<div style="color:white;text-align:center;font-size:large;display:block;"> 
				<div> Mayura Consultancy Services is the best IT and Software development</div>
				<div>Company helping companies across globe to transform their business using</div>
				<div>Cutting edge technologies in mobility, data analytics and user experience.</div>
			</div>
		</div>
		<p style="padding:10px;">
		<a target="_blank" href="<?php echo site_url('site/register')?>"><button class="btn btn-outline rounded-pill" style="color: white;border-color: white;border-width:3px;font-weight:bold;padding-top: 10px;padding-bottom: 10px;">Start Your Journey</button></a>
		</p>	
	</div>
</section>
<section style="padding:60px;" id="ab">
	<div class="row">
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
                  <!--  <img src="<?php echo base_url();?>axxets/classic/images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">-->
                  	<video width="100%" height="200" controls>
	  					<source src="<?php echo base_url();?>axxets/templates/2/images/oceans.mp4" type="video/mp4">
					</video>
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
<div style="padding: 30px;" id="services">
	<p style="text-align: center;font-size: x-large;color:#108bf5;font-weight: bold;"> <?php echo config_item('company_name') ?>is the place where you relive the power of networking and</p>
	<p style="text-align: center;font-size: x-large;color:#108bf5;font-weight: bold;">make your own fortune.</p>
	<div style="text-align: center;" >Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
<section id="service" style="padding: 30px;">
	<div class="row">
		<div class="col-lg-3 col-md-4 col-6">
			<div>
				<span class="et-pb-icon et-waypoint et_pb_animation_top" style="color: #25b4e9;">&#xe109;</span>	
			</div>
			<div style="text-align: left;display: block;">
				<h5 style="color:#108bf5;">CONNECT</h5>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi eros, molestie sit amet sodales
				</p>
			</div>	
		</div>
		<div class="col-lg-3 col-md-4 col-6">
			<div>
			<span class="et-pb-icon et-waypoint et_pb_animation_top" style="color: #25b4e9;">&#xe109;</span>	
			</div>
			<div style="text-align: left;display: block;">
				<h5 style="color:#108bf5;">COMMUNICATE</h5>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi eros, molestie sit amet sodales
				</p>
			</div>	
		</div>
		<div class="col-lg-3 col-md-4 col-6" style="background-color: transparent;">
			<div>
			<span class="" style="color: #25b4e9;">&#xe109;</span>	
			</div>
			<div style="text-align: left;display: block;">
				<h5 style="color:#108bf5;">COLLABRATE</h5>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi eros, molestie sit amet sodales
				</p>
			</div>	
		</div>
		<div class="col-lg-3 col-md-4 col-6">
			<div>
			<span class="et-pb-icon et-waypoint et_pb_animation_top" style="color: #25b4e9;">&#xe109;</span>	
			</div>
			<div style="text-align: left;display: block;">
				<h5 style="color:#108bf5;">CONQUER</h5>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi eros, molestie sit amet sodales
				</p>
			</div>	
		</div>
	</div>
</section>
<div class="testimonial-area section-padding" id="tst">
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-center m-auto">
				<h2 style="text-align:center;">Testimonials</h2>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Carousel indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>   
					<!-- Wrapper for carousel items -->
					<div class="carousel-inner">
						<div class="item carousel-item active">
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/2/images/1.png" alt=""></div>
							<p class="testimonial" style="color:black;"><a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential...</a></p>
							<div>
								<span class="overview"><b>Arundathi Nair</b>,</span>
								<span style="color: #7e5738;font-weight: bold;">JANUARY 01,202</span>
							</div>
						</div>
						<div class="item carousel-item">
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/2/images/2.png" alt=""></div>
							<p class="testimonial"><a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential...</a></p>
							<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
						</div>
						<div class="item carousel-item">
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/2/images/1.png" alt=""></div>
							<p class="testimonial"><a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential..
							</a></p>
							<p class="overview"><b>Michael Holz</b>, Seo Analyst</p>
						</div>
					</div>
					<!-- Carousel controls -->
				<!--	<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>-->
				</div>
			</div>
		</div>
	</div>
</div>
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
                            <input type="number" placeholder="Phone Number" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
                        </div>
                        <div class="form-double">
                            <input type="email" name="form-email" name="email" id="form-email" placeholder="Your Email" required="required" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
          
                            <input type="text" name="form-subject" id="form-subject" placeholder="Subject" required="required" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;">
                        </div>
                        <textarea name="form-message" id="message" id="form-message" rows="5" required="required" placeholder="Message" style="padding: 15px;margin-bottom: 20px;width: 100%; display: block;border: none;border-bottom: 1px solid #e8e8e8;outline: none;background-color: #eee;"></textarea>
                         <input type="submit" name="submit" class="bttn bttn-primary" value="Submit Now ">
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="contact-info" style="color: #495057;">
                    <p><span class="info-icon">
             			<i class='fas fa-map-marker' style='color:grey';></i>
                    </span> <?php echo config_item('company_name'); ?> <br /> <?php echo config_item('company_address'); ?></p>
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
<footer>
	<div style="background-color:#222;padding: 10px;">
		<p style="color: #666;margin-left: 40px;margin-top: 10px;"><?php echo config_item('company_name') ?>
			<a class="icon fb" href="#" style="float:right;"><i class="fa fa-facebook" style="color:grey;">&nbsp;&nbsp;</i></a>
			<a class="icon tw" href="#" style="float:right;"><i class="fa fa-twitter" style="color:grey;">&nbsp;</i></a>
			<a class="icon pin" href="#" style="float:right;"><i class="fa fa-pinterest" style="color:grey;">&nbsp;</i></a>
			<a class="icon db" href="#" style="float:right;"><i class="fa fa-dribbble" style="color:grey;" >&nbsp;</i></a>
			<a class="icon gp" href="#" style="float:right;"><i class="fa fa-google-plus" style="color:grey;">&nbsp;</i></a>
		</p>
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
