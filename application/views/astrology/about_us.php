<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css');?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header');?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active">About Us</li>
</ol>

<section>
	<div class="jumbotron m-5 shadow-lg">
		<div class="container">
			<div class="container container-fluid">
				<div class="row">
					<div class="col-7">
						<h2 class="display-4">About Agastya...</h2>
						  <p class="lead pt-3">&nbsp;&nbsp;&nbsp;Our Agastya App is an Astro-Tech Company which aims to reorient the way people perceive and understand Vedic Astrology.<br>&nbsp;&nbsp;&nbsp;
						  We offer revolutionary and unique solutions for making astrological calculations and predictions, generating and analyzing horoscopes and preparing precise and customized reports. We seek to present Astrology in a simplified, yet accurate manner so that it is reachable and understandable to all.
						  </p>
						  <hr class="my-4">
						  <h5>You can access your daily, weekly and monthly horoscope, your zodiac sign's characteristics and compatibility with other signs.</h5>
						  <p class="lead">
						    <a class="btn btn-primary btn-lg mt-2" href="<?php echo site_url('astrology/astro_home') ?>" role="button">Click Here</a>
						  </p>
					</div>
					<div class="col-4">
						<img src="<?php echo base_url('axxets/astrology/img/astrology.png') ?>" class="pb-5 d-none d-sm-block" height="500px" width="500px">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>