<!DOCTYPE html>
<html>
<head>
	<title>Rudraksha</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css') ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/rudraksha_input')?>" id="breadcrumbLink">Rudraksha</a></li>
  <li class="breadcrumb-item active">Rudraksha Recommendation</li>
</ol>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/rudraksha.png') ?>" class="pb-5 d-none d-sm-block" height="180">
				</div>
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Rudraksha for You</h2>
					<h4 style="color: black">
						<?php 
						$data_rudraksh = json_decode($responseData25);  
						$image_rudraksha=$data_rudraksh->img_url;
						//echo "<img src='".$image_rudraksha."' height='180'>";
						echo "<br>".$data_rudraksh->name;
						?>
						</h4>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container mb-5">
		<p style="font-size: 20px;"><?php echo $data_rudraksh->detail; ?><p>
	</div>
</section>

<section>
	<div class="container">
		<div class="jumbotron jumbotron2">
			<div class="row">
				<div class="col-12 col-md-8">
					<div class="text-center">
						<h2 style="color: black">Check Out the Astrology <span>Loyalty Program</span> </h2>
						<h4 style="color: black">Earn Free recharge packs against your loyalty points</h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<button class="btn btn-circle"><span style="font-size: 26px;">Click Here</span></button>
				</div>	
			</div>
		</div>
	</div>
</section>
