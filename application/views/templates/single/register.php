<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../images/favicon.ico">
    <title>Bx-code admin - Registration </title>
	<!-- Bootstrap 4.1-->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
		<!-- Bootstrap extend-->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/css/bootstrap-extend.css">	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/font-awesome/css/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/font-awesome/css/font-awesome-animation.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/Ionicons/css/ionicons.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/themify-icons/themify-icons.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/linea-icons/linea.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/glyphicons/glyphicon.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/flag-icon/css/flag-icon.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/material-design-iconic-font/css/materialdesignicons.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/mega/vendor_components/simple-line-icons-master/css/simple-line-icons.css"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/css/master_style.css">
	<!-- Bx-code admin skins -->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/css/skins/_all-skins.css">	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		.arrow{
  		display: none;
		 }
		 .h-p100{
		 	margin-top: 50px;
		 	margin-left: 20px;
		 	margin-right: 10%;
		 }
		 .i1{
		 	height: 753px;
		 }
	</style>
</head>
<body>
	<section class="slides">
	<div id="demo" class="carousel slide" data-ride="carousel">
  	 	<div class="carousel-inner">
			<div class="carousel-item active">
				<img  class="img-fluid i1" src="axxets/mega/images/auth-bg/bg-1.jpg";alt="first slide">
				
			</div>
   	 		<div class="carousel-item">	
     			<img class="img-fluid i1" src="axxets/mega/images/auth-bg/bg-2.jpg";alt="second slide">
					
			</div>
    		<div class="carousel-item">
     			<img class="img-fluid i1" src="axxets/mega/images/auth-bg/bg-3.jpg"; alt="Third slide" >
 		  		
    		</div>
    		<div class="carousel-item">	
     			<img class="img-fluid i1" src="axxets/mega/images/auth-bg/bg-4.jpg";alt="second slide">
			</div>
			<div class="carousel-item">	
     			<img class="img-fluid i1" src="axxets/mega/images/auth-bg/bg-5.jpg";alt="second slide">
			</div>
			<div class="carousel-item">	
     			<img class="img-fluid i1" src="axxets/mega/images/auth-bg/bg-6.jpg";alt="second slide">
			</div>
			<div class="carousel-item">	
     			<img class="img-fluid i1" src="axxets/mega/images/auth-bg/bg-7.jpg";alt="second slide">
			</div>
 		
			<a class="carousel-control-prev arrow" href="#demo" data-slide="prev" >
			    <span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next arrow" href="#demo" data-slide="next" >
			    <span class="carousel-control-next-icon"></span>
			</a>	
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="b-1">
							<div class="content-top-agile p-10 pb-0">
								<h2 class="text-white mb-0">Register a New Membership</h2>						
							</div>
							<div class="p-30">
								<?php echo form_open() ?>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
											</div>
											<input type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Full Name">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
											</div>
											<input type="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent text-white"><i class="ti-lock"></i></span>
											</div>
											<input type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent text-white"><i class="ti-lock"></i></span>
											</div>
											<input type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Retype Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-12">
										  <div class="checkbox text-white">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-info btn-rounded margin-top-10" onclick="before_show()">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>			
    							<?php echo form_close();?>											
								<div class="text-center text-white">
								  <p class="mt-20">- Register With -</p>
								  <p class="gap-items-2 mb-20">
									  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
									  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
									  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
									  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
									</p>	
								</div>
								<div class="text-center">
									<p class="mt-15 mb-0 text-white">Already have an account?<a href="auth_login.html" class="text-danger ml-5"><a href="<?php echo site_url("site/login");?>"> Sign In</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
</div>
</section>
	<!-- jQuery 3 -->
	<script href="<?php echo base_url();?>axxets/mega/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
	
	<!-- fullscreen -->
	<script href="<?php echo base_url();?>axxets/mega/vendor_components/screenfull/screenfull.js"></script>
	
	<!-- popper -->
	<script href="<?php echo base_url();?>axxets/mega/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script href="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
	
</html>