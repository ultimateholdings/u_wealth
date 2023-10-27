<!DOCTYPE html>
<html>
<head>
	<title>Ascendant report</title>
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


<ol class="breadcrumb ">
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/astro_home')?>"  id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/vimshottari_dasha_input')?>"  id="breadcrumbLink">Ascendant Form</a></li>
  <li class="breadcrumb-item active">Ascendant Report</li>
</ol>
<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/ascendantN.png') ?>" class="img-thumbnail" alt="..." style="height: 450px; width: 600px;">
				</div>
				<div class="col-12 col-md-5 p-5">
					<h3>What is Ascendant ?</h3>
					<p class="mt-4" style="font-size: 20px;">The first house is known as Ascendant (Lagna) represents the presence of a person in a physical form. It represents the early life, childhood, character, health, willpower, fame, nature and different aspect of life. This house provides a peek into the sense of knowing one’s weakness, strength, likes, dislikes and much more. It is helpful to a person’s personality. How they perceive manners, behaviours and attitude in one’s life.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
	$data_ascendant=json_decode($responseData29);
	//echo $responseData29;
	?>
<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/ascendantN.png') ?>" class="pb-5 d-none d-sm-block" height="160"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Your Ascendant report</h2>
					<h4 style="color: yellow"><?php echo $name; ?></h4>
					<p style="color: yellow;"><?php echo $date."/".$month."/".$year; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $hour."hr : ".$minute."min : ".$second."sec"; ?></p>
					<!--<p style="margin-top: -16px;color: yellow;"><?php echo $birthplace; ?></p>-->
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row mb-5" style="font-size: 20px;">
			<div class="col-md mb-3"><?php echo $data_ascendant->asc_report->report; ?></div>
		</div>
	</div>
</section>

<!--<section>
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
</section>-->

<!-- Footer -->

	