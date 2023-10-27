<!DOCTYPE html>
<html>
<head>
	<title>Pitra Dosha</title>
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

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/pitri_dasha_input')?>" id="breadcrumbLink">Pitra-dosh</a></li>
  <li class="breadcrumb-item active">Pitra-dosh report</li>
</ol>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/pitraN.png') ?>" class="pb-5 d-none d-sm-block" height="150"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="font-size: 44px;">What is Pitra Dosha?</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<p style="font-size: 20px;">
			<?php 
			$data_pitradosh = json_decode($responseData20);
			echo $data_pitradosh->what_is_pitri_dosha; ?>
			
		</p>
	</div>
</section>


<section>
	<div class="container my-5">
		  <h4 class="alert-heading">Status</h4>
		  <p>
			<?php 
			 if($data_pitradosh->is_pitri_dosha_present == false){
				echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>".$data_pitradosh->conclusion."</h4></div>";
		 } 
		 else{ 
			echo "<div class='alert alert-danger role='alert'><h4 class='alert-heading'>Pitra-dosh Alert!!</h4>".$data_pitradosh->conclusion."</div>";
		 	} 
		 ?>
		 	</p>
		  <hr>
	</div>
</section>

<section>
	<div class="container mb-5" style="font-size: 20px;">
		<div class="row">
			<h2 style="font-size: 44px;">Remedies for Pitri Dosha</h2>
		</div><hr class="bg-info" />
		<ul class="bullets next-line-pad list" style="padding-left: 25px">
			<?php if($data_pitradosh->is_pitri_dosha_present==true){
				foreach ($data_pitradosh->remedies as $remedy):?>
			<li class="mt-3"><?php echo $remedy; ?></li>
			<?php endforeach; }
			else{
				echo "No remedies for now";
			} ?>
		</ul>
	</div>
</section>

<section>
	<div class="container mb-5" style="font-size: 20px;">
		<div class="row">
			<h2 style="font-size: 44px;">Effects of Pitri Dosha</h2>
		</div><hr class="bg-info" />
		<ul class="bullets next-line-pad list" style="padding-left: 25px">
			<?php if($data_pitradosh->is_pitri_dosha_present==true){
			foreach ($data_pitradosh->effects as $effect):?>
			<li class="mt-3"><?php echo $effect; ?></li>
			<?php endforeach; }
				else{
				echo "Nothing to worry.";
			}
			?>
		</ul>
	</div>
</section>

<section>
	<div class="container">
		<div class="jumbotron jumbotron2">
			<div class="row">
				<div class="col-12 col-md-8">
					<div class="text-center">
						<h2 style="color: white">Check Out the Astrology <span>Loyalty Program</span> </h2>
						<h4 style="color: white">Earn Free recharge packs against your loyalty points</h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<button class="btn btn-circle"><span style="font-size: 26px;">Click Here</span></button>
				</div>	
			</div>
		</div>
	</div>
</section>
