<?php
$logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>axxets/client/favicon.ico">

    <title><?php echo config_item('company_name') ?></title>
  
	<!-- Bootstrap 4.1-->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/mega/css/bootstrap-extend.css">	
	
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
			.fa {
	    display: inline-block;
	    font: normal normal normal 14px/1 FontAwesome;
	    font-size: inherit;
	    text-rendering: auto;
	    -webkit-font-smoothing: antialiased;
	    -moz-osx-font-smoothing: grayscale;
	}
	</style>

</head>
<body class="hold-transition text-center bg-light">
	
	<div class="container h-p100">
		<div class="row justify-content-md-center align-items-center h-p100">
			<div class="col-12">
				<div class="box bg-transparent no-border no-shadow">	
					<div class="box-body text-center">
						
						<a href="<?php echo site_url('/'); ?>"><img src="<?php echo $logo; ?>" alt="logo"></a>
						
						<h1 class="mt-30 mb-10 font-size-50 text-success">We are launching <strong>soon!</strong></h1>
						<p class="font-size-24">Our new website is under process</p>
						
						<!--timer-->
						<div class="row">
							<div class="col-10 col-lg-8 mx-auto">
								<div class="bg-transparent">
									<div class="examples bg-transparent">
										<div id="countdown" class="countdown3 row justify-content-md-center text-dark"></div>
									</div>	
						    	</div>	
						    </div>
						</div>
						<!--//timer-->
							<p class="gap-items-2 my-35">
							  <!--<a class="btn btn-social-icon btn-outline btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
							  <a class="btn btn-social-icon btn-outline btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
							  <a class="btn btn-social-icon btn-outline btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
							  <a class="btn btn-social-icon btn-outline btn-twitter" href="#"><i class="fa fa-twitter"></i></a>-->
							</p>
						  <p><?php if(config_item('footer_name') != '') { ?>
					            &copy; <?php echo date('Y') ?> All Rights Reserved by
					    <?php echo config_item('footer_name') ?>
					    <?php } else { ?>
					    &copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <a href='https://www.globalmlmsolution.com' alt='_blank' style='color: blue;'> Global MLM Software </a>
					    <?php } ?></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	

	<!-- jQuery 3 -->
	<script src="<?php echo base_url();?>axxets/mega/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
	
	<!-- fullscreen -->
	<script src="<?php echo base_url();?>axxets/mega/vendor_components/screenfull/screenfull.js"></script>
	
	<!-- popper -->
	<script src="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/popper.min.js"></script>
	
	<!-- Bootstrap 4.1-->
	<script src="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- timer-->
	<script src="<?php echo base_url();?>axxets/mega/js/pages/coundown-timer.js"></script>


</body>
</html>
