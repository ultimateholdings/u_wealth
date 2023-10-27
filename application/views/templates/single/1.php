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
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/1/css/bootstrap.min.css">
<script src="<?php echo base_url();?>axxets/templates/1/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>axxets/templates/1/js/popper.min.js"></script>
<script src="<?php echo base_url();?>axxets/templates/1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>	  	
@media (max-width: 780px) {
.row{
padding-right: 0;
padding-left: 0;
margin: 0px;
	}
}
@media (min-width:1200px) {
.row{
padding-right: 0;
padding-left: 0;
margin: 0px;
	}
}
@media (max-width: 780px) {
.plan{
padding-top: 50px;
padding-right: 0px;
padding-bottom: 50px;
padding-left: 0px;	
}
}
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
.fa:hover{
	color:blue;
}
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
	background: #000080;
	border-color: transparent;
	box-shadow: inset 0 2px 1px rgba(0,0,128,0.2);
}
.carousel-indicators li.active {	
	background: #000080;		
	box-shadow: inset 0 2px 1px rgba(0,0,128,0.2);
}
</style>
</head>
<body>
<header class="img-fluid" style="background-color: rgb(255, 255, 255);
    background-image: url(<?php echo base_url();?>axxets/templates/1/images/slide-bg-2.jpg);
    padding-top: 79px;background-size:cover;">
	<div class="mh" style="padding:20px">
		<div class="container">
			<div class="navbar fixed-top navbar-expand-lg navbar-light">
				<a class="navbar-brand mr-auto" href="#">
	      			<img class="img-fluid" style="height:40px;" src="<?php echo base_url();?>axxets/templates/1/images/logo2.png"/>
	     		</a>
	    			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
	     				<span  class="navbar-toggler-icon" style="border: none;"></span>
	     			</button>
	      		<div class="collapse navbar-collapse" id="collapse_Navbar">
	       			<ul class="navbar-nav ml-auto" style="">
	    				<li class="nav-item">
	          				<a class="nav-link" href="#" style="color:white;font-weight: bold;">HOME &nbsp;</a>
	    				</li>
	    				<li class="nav-item">
	          				<a class="nav-link" href="#about-area" style="color:white;font-weight: bold;">About Us &nbsp;</a>
	    				</li>
	    				<li class="nav-item">
	    					<a class="nav-link" href="#plans" style="font-weight:bold;color:white;">PLANS &nbsp;</a>
	    				</li>
	    				<!--<li class="nav-item">
	    					<a class="nav-link" href="#bp" style="font-weight:bold;color:white">BUSINESS PLAN &nbsp;</a>
	    				</li>-->
	    				<li class="nav-item"><a target="_blank" href="<?php echo base_url();?>axxets/templates/1/images/business_plan.pdf" class="nav-link"  style="font-weight:bold;color:white;">BUSINESS PLAN</a></li>
	    				<li class="nav-item">
	    					<a class="nav-link" href="#commission" style="font-weight:bold;color:white;">COMMISSIONS &nbsp;</a>
	    				</li>
	    				<li class="nav-item">
	    					<a class="nav-link" href="#tst" style="font-weight:bold;color:white;">TESTIMONIALS &nbsp;</a>
	    				</li>
	    				<li class="nav-item">
	    					<a class="nav-link" href="#contact" style="font-weight:bold;color:white;">CONTACT</a>
	    				</li>
	    				<li><a target="_blank" href="<?php echo site_url('site/register')?>" class="nav-link" style="font-weight:bold; color:white;">REGISTER</a></li>
	    				<li><a target="_blank" href="<?php echo site_url('site/login')?>" class="nav-link" style="font-weight:bold;color:white;">MEMBER LOGIN</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<section style="padding:100px;">
	<div>
		<h1 style="text-align: center;color: white;font-weight: bold;">The Art of Home Business</h1>
		<h4 style="text-align: center;color: white;font-weight: bold;">Explore the Opportunities and Tools to Make Direct Selling as one of the</h4>
		<h4 style="text-align: center;color: white;font-weight: bold;">Premium Source of Income</h4>
		<div class="text-center" style="padding:30px;">
			<a target="_blank" href="<?php echo site_url('site/register')?>"><button class="btn btn-outline" style="background-color:none;color: white;border-color: white;border-width:2px;"><h4>Join The Team</h4></button></a>
		</div>
	</div>
</section>
</header>
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
                    <img src="<?php echo base_url();?>axxets/templates/1/images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
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
							<a href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
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
						<a href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
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
						<a href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
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
						<a href="<?php echo site_url('site/register');?>" class="bttn bttn-sm bttn-default">Purchase Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="plan" id="bp" style="background-color: #eaeaea">
	<div class="content" style="padding-top:30px;padding-bottom:30px;width: 80%;margin: auto;">
		<div class="heading">
			<h3 style="color: #424242;text-align: left;"><strong>BUSINESS PLAN</strong></h3>
			<p>Here is the vedio which shows you the business plan structure, what are all the various commissions that are applicable, and the products that are available</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque efficitur sodales lorem et sodales. Fusce nunc sapien, tristique vel posuere a, ullamcorper at mi. Aliquam mollis turpis sed nulla tempor tempus. Praesent non neque sollicitudin, dapibus turpis id, sagittis odio. Vivamus gravida condimentum quam eu posuere.</p>
		</div>
		<div class="text-center">
			<video width="100%" height="200" controls>
	  			<source src="<?php echo base_url();?>axxets/template5/images/oceans.mp4" type="video/mp4">
	 			<source src="movie.ogg" type="video/ogg">
					Your browser does not support the video tag.
			</video>
			<!--<a target="_blank" href="<?php echo base_url();?>axxets/templates/1/images/business_plan.pdf"><img class="img-fluid" src="<?php echo base_url();?>axxets/templates/1/images/presentation_skin.png"></a>-->
		</div>
	</div>
</section>
<section class="commissions" id="commission"  style="padding-top:100px;width: 80%;margin: auto;">
	<div>
		<h3 style="font-weight: bold;">COMMISSIONS</h3>
	</div>	
	<div class="row" style="padding: 0px;margin: 0px;">
		<div class="col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="card" style="border:none">
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid" src="<?php echo base_url();?>axxets/templates/1/images/travel_bonus.png">
					</div>
					<div class="content">
						<h4>Sponsor/Introducer Bonus</h4>
						<p>In a matching bonus, the sponsoring distributor receives a commission based on the bonus earnings of distributors they've sponsored. A matching bonus typically applies to a level or rank bonus in Unilevel or matrix commission plans or any retail/wholesale bonuses the sponsored distributor may have earned.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="card" style="border:none">
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid" src="<?php echo base_url();?>axxets/templates/1/images/quick_start_bonus.png">
					</div>
					<div class="content">
						<h4>Matching Bonus</h4>
						<p>In a matching bonus, the sponsoring distributor receives a commission based on the bonus earnings of distributors they've sponsored. A matching bonus typically applies to a level or rank bonus in Unilevel or matrix commission plans or any retail/wholesale bonuses the sponsored distributor may have earned.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="card" style="border:none">
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid" src="<?php echo base_url();?>axxets/templates/1/images/quick_start_bonus-1.png">
					</div>
					<div class="content">
						<h4>Pairing Bonus</h4>
						<p>A network marketer gets Pairing Bonus under Binary MLM Compensation Plan. Binary tree network is in the form of a tree with two legs. The pairing bonus is paid to the distributor when the tree is complete,ie,bonus is gained based on the downline members’ sales. The maximum pairing bonus is calculated based on the plan the distributor chooses.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="card" style="border:none">
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid" src="<?php echo base_url();?>axxets/templates/1/images/weekly_bonus.png">
					</div>
					<div class="content">
						<h4>Position Bonus</h4>
						<p>A member in a Matrix MLM Plan gets a position bonus when the downline team members recruit new members and they join the matrix.
                        For instance, if the matrix is 3*3, the said member will be eligible to receive position bonus when a new member joins his 3rd down level. The percentage of position bonus can be adjusted as per the company’s policies.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="card" style="border:none">
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid" src="<?php echo base_url();?>axxets/templates/1/images/matching_bonus-1.png">
					</div>
					<div class="content">
						<h4>Fast Start Bonus</h4>
						<p>This is sort of a starter benefit that the distributor in a Unilevel MLM Plan and he is eligible for this when he signs up a new member. To qualify for this bonus, the distributor must achieve a specific target set the company upon which he earns a pre intimated amount per new recruit. This bonus is responsible for the fast growth of most Unilevel MLM networks. 
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="card" style="border:none">
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid" src="<?php echo base_url();?>axxets/templates/1/images/achiver_bonus.png">
					</div>
					<div class="content">
						<h4>Achiver Bonus</h4>
						<p>The bonus that is paid to existing members when they turn eligible to the higher level or rank. It acts as a promotion bonus in the MLM industry.Once the user achieves the bonus he will be rewarded with some gifts.</p>
					</div>
				</div>
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
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/1/images/1.png" alt=""></div>
							<p class="testimonial" style="color:black;"><a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential...</a></p>
							<div>
								<span class="overview"><b>Arundathi Nair</b>,</span>
								<span style="color: #7e5738;font-weight: bold;">JANUARY 01,202</span>
							</div>
						</div>
						<div class="item carousel-item">
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/1/images/2.png" alt=""></div>
							<p class="testimonial"><a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential...</a></p>
							<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
						</div>
						<div class="item carousel-item">
							<div class="img-box"><img src="<?php echo base_url();?>axxets/templates/1/images/1.png" alt=""></div>
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
<br></br>
<br></br>
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
                         <input type="submit" name="submit" class="bttn bttn-primary" value="Submit Now" style="background: grey;">
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="contact-info" style="color: #495057;">
                    <p><span class="info-icon">
             			<i class="icofont icofont-social-google-map"></i></i>
                    </span><?php echo config_item('company_name'); ?> <br /> <?php echo config_item('company_address'); ?></p>
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
	<div style="background-color:#222;height:60px;">
		<div style="padding: 20px;">
			<p style="color: white;"><?php echo config_item('company_name') ?>
			 	<span style="float: right;"><i class="fa fa-facebook" aria-hidden="true">&nbsp;</i>
			 	<i class="fa fa-twitter" aria-hidden="true">&nbsp;</i>
			 	<i class="fa fa-rss" aria-hidden="true">&nbsp;</i>	
			 	<i class="fa fa-google-plus"></i></span>			 	
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