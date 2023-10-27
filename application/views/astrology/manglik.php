<!DOCTYPE html>
<html>
<head>
	<title>Manglik</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendent-report.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/manglik.css'); ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>


<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/manglik_dosha_input')?>" id="breadcrumbLink">Manglik Dosha</a></li>
  <li class="breadcrumb-item active">Manglik Dosha Report</li>
</ol>
<section>
	<div class="jumbotron" style="background-color: white">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3>What is Manglik Dosha ?</h3>
					<p class="mt-4" style="font-size: 20px;">The Manglik Dosha is known to be very inauspicious and the individual may remain unmarried throughout his life. People are generally fearful towards this negative result of the planet that could effect their life. Especially, marriage. The Vedic astrology considers ascendent and the placement of 4th, 2nd, 7th, 8th and 12th house as unfavourable. Mars is basically known as the killer of marriage in all these houses as it is a significator of an individual’s health, personality and physic. An individual of Mars has the lack of politeness as their trait.
					</p>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/manglikN.png') ?>" class="img-thumbnail ml-2" alt="..." style="height: 300px; width: 300px;border: none;">
				</div>
			</div>
		</div>
	</div>
</section>
<?php 	$data_manglik = json_decode($responseData21);
// echo $responseData21; ?>
<section>
	<div class="container mb-5">
		  <h4 class="alert-heading">Status</h4>
		  <p>
			<?php 
			 if($data_manglik->is_present == false){
				echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>". $data_manglik->manglik_report."</h4></div>";
		 } 
		 else{ 
			echo "<div class='alert alert-danger role='alert'><h4 class='alert-heading'>Manglik Alert!!</h4>".$data_manglik->manglik_report."</div>";
		 	} 
		 ?>
		 	</p>
		  <hr>
	</div>
</section>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/manglikN.png') ?>" class="pb-5 d-none d-sm-block" height="170"  >
				</div>
				<div class="col-12 col-md-8 mt-4">
					<h2 style="color: black; font-size: 44px;">Reasons Behind Manglik Dosha</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
					<div class="col-md-6">
						<h4 class="m-b-5">Rules based on Houses</h4>
						<ul class="bullets next-line-pad list" style="padding-left: 25px">
							<?php foreach ($data_manglik->manglik_present_rule->based_on_house as $house):?>
								<li class="mt-3"><?php echo $house; ?></li>
								<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-md-6">
						<h4 class="m-b-5">Rules based on Aspect</h4>
						<ul class="bullets next-line-pad list" style="padding-left: 25px">
							<?php foreach ($data_manglik->manglik_present_rule->based_on_aspect as $aspect):?>
							<li class="mt-3"><?php echo $aspect; ?></li>
							<?php endforeach; ?>
							<hr class="m-t-5 m-b-5">
						</ul>
					</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/manglikN.png') ?>" class="pb-5 d-none d-sm-block" height="170"  >
				</div>
				<div class="col-12 col-md-8 mt-4">
					<h2 style="color: black; font-size: 44px;">Remedies for Manglik Dosha</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container mb-5" style="font-size: 20px;">
		<ul>
			<li>Install an energized Mangal Yantra in your place of worship. Meditate on the triangular Mangal Yantra along with the recitation of Mangal mantra: Om Kram Krim Krom Sah Bhomayay Namah.</li>
			<li class="mt-3">In the evening, visit a Hanuman temple draw a triangle with red kumkum (roli) on a plate and worship Hanumanji with sindoor or red sandalwood, red flowers and a lighted lamp.</li>
			<li class="mt-3">Worship Lord Hanuman with the mantra: "||OM SHREEM HANUMATE NAMAH||"</li>
		</ul>
	</div>
</section>

<!--<section>
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
</section>-->
