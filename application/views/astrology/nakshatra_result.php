<!DOCTYPE html>
<html>
<head>
	<title>Nakshatra_result</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/nakshatra_result.css');?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/nakshatra_input')?>" id="breadcrumbLink">Nakshatra</a></li>
  <li class="breadcrumb-item active">Nakshatra Prediction</li>
</ol>
<?php //echo $responseData31; 
$data_DailyNakshtra=json_decode($responseData31);
?>
<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/nakshatra.jpg') ?>" class="pb-5 d-none d-sm-block" height="180"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Your Nakshatra report</h2>
					<h4 style="color: yellow"><?php echo $name; ?></h4>
					<p style="color: yellow;"><?php echo $date."/"."$month"."/".$year."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$hour."hr : ".$minute."min : ".$second."sec" ?></p>
					<p style="margin-top: -16px;color: yellow;"><?php echo $place ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!--<section>
	<div class="container my-5">
		<div class="card">
		  <div class="card-header text-center" style="font-size: 24px;font-weight: 500;">Your Moon Nakshatra is <?php echo $data_DailyNakshtra->birth_moon_nakshatra ?></div>
		  <div class="card-body">
		  	<div class="row mt-5">
			    <div class="col-md-6">
				    <table class="table table-striped">
					  <tbody>
					    <tr>
					      <td>Ascendant</td>
					      <th scope="col">Saggitarius</th>
					    </tr>
					    <tr>
					      <td>Yoni</td>
					      <th>Marjaar</th>
					    </tr>
					    <tr>
					      <td>SignLord</td>
					      <th>Mercury</th>
					    </tr>
					    <tr>
					      <td scope="row">Nakshatra</td>
					      <th><?php echo $data_DailyNakshtra->birth_moon_nakshatra ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Karan</td>
					      <th>Baalav</th>
					    </tr>
					    <tr>
					      <td scope="row">Yunja</td>
					      <th>Madhya</th>
					    </tr>
					    <tr>
					      <td scope="row">Name Alphabet</td>
					      <th>ke</th>
					    </tr>
					    </tbody>
					</table>
				</div>
				<div class="col-md-6">
				    <table class="table table-striped">
					  <tbody>
					    <tr>
					      <td>Varna</td>
					      <th scope="col">Shoodra</th>
					    </tr>
					    <tr>
					      <td>Gan</td>
					      <th>Dev</th>
					    </tr>
					    <tr>
					      <td>Sign</td>
					      <th>Gemini</th>
					    </tr>
					    <tr>
					      <td scope="row">Yog</td>
					      <th>Shiv</th>
					    </tr>
					    <tr>
					      <td scope="row">Tithi</td>
					      <th>Krishna Ashtami</th>
					    </tr>
					    <tr>
					      <td scope="row">Tatva</td>
					      <th>Air</th>
					    </tr>
					    <tr>
					      <td scope="row">Paya</td>
					      <th>Silver</th>
					    </tr>
					    </tbody>
					</table>
				</div>
			</div> 	
		    </div>
		</div>
	</div>
</section>-->

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3>What your Nakshatra says about you?</h3>
					<p class="mt-4" style="font-size: 20px;">
						&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->health ?><br>
						&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->emotions ?><br>
						&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->profession ?><br>
						&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->personal_life ?><br>
						&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->luck ?><br>
						&nbsp;&nbsp;&nbsp;<?php echo $data_DailyNakshtra->prediction->travel ?>
					</p>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/nakshatra.jpg') ?>" class="img-thumbnail" alt="..." style="height: 350px; width: 600px;">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Footer -->
