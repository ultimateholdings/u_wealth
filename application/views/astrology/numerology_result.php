<!DOCTYPE html>
<html>
<head>
	<title>Numerology_result</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/numerology_result.css'); ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/numerology_input')?>" id="breadcrumbLink">Numerology</a></li>
  <li class="breadcrumb-item active">Numerology Prediction</li>
</ol>
<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/numerologyN.png')?>" class="pb-5 d-none d-sm-block" height="160"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Your Numerology report</h2>
					<?php $data_numerology=json_decode($responseData38); 
						$data_numerologyReport=json_decode($responseData39); 
						$data_numerologyFavTime=json_decode($responseData40); 
						$data_numerologyPlaceVastu=json_decode($responseData41);
						$data_numerologyFastsReport=json_decode($responseData42);
						$data_numerologyFavLord=json_decode($responseData43);
						$data_numerologyFavMantra=json_decode($responseData44);
				    		//echo $responseData43;
				    	?><br>
					<h3 style="color: black"><?php echo $data_numerology->name; ?></h3>
					<h4 style="color: white"><p><?php echo $data_numerology->date; ?></p></h4>
					</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container my-5">
		<div class="card">
		  <div class="card-header text-center" style="font-size: 24px;font-weight: 500;">Numerology For You</div>
		  <div class="card-body">
		  	<div class="row">
		  		<div class="col-md-3">
				    <div class="rounded-circle ml-5">
				    	<p class="number"><?php echo $data_numerology->destiny_number; ?></p>
				    </div>
				    <p class="mt-3 ml-5	">Destiny Number</p>
				</div>
				<div class="col-md-3">
				    <div class="rounded-circle ml-5">
				    	<p class="number"><?php echo $data_numerology->radical_number; ?></p>
				    </div>
				    <p class="mt-3 ml-5">Radical Number</p>
				</div>
				<div class="col-md-3 ">
				    <div class="rounded-circle ml-5">
				    	<p class="number"><?php echo $data_numerology->name_number; ?></p>
				    </div>
				    <p class="mt-3 ml-5">Name Number</p>
				</div>
				<div class="col-md-3">
				    <div class="rounded-circle ml-5">
				    	<p class="number" style="margin-left: 24%;"><?php echo $data_numerology->evil_num; ?></p>
				    </div>
				    <p class="mt-3 ml-5">Evil Number</p>
				</div>    
		    </div>
		    <div class="row mt-5">
			    <div class="col-md-6">
				    <table class="table table-striped">
					  <tbody>
					    <tr>
					      <td>Your Name</td>
					      <th scope="col"><?php echo $data_numerology->name; ?></th>
					    </tr>
					    <tr>
					      <td>Birth Date</td>
					      <th><?php echo $data_numerology->date; ?></th>
					    </tr>
					    <tr>
					      <td>Radical Number</td>
					      <th><?php echo $data_numerology->radical_number; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Name Number</td>
					      <th><?php echo $data_numerology->name_number; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Destiny Number</td>
					      <th><?php echo $data_numerology->destiny_number; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Radical Ruler</td>
					      <th><?php echo $data_numerology->radical_ruler; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Friendly Numbers</td>
					      <th><?php echo $data_numerology->friendly_num; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Evil Numbers</td>
					      <th><?php echo $data_numerology->evil_num; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Neutral Numbers</td>
					      <th><?php echo $data_numerology->neutral_num; ?></th>
					    </tr>			    			    			    			    
					  </tbody>
					</table>
				</div>
				<div class="col-md-6">
				    <table class="table table-striped">
					  <tbody>
					    <tr>
					      <td>Favourbale days</td>
					      <th scope="col"><?php echo $data_numerology->fav_day; ?></th>
					    </tr>
					    <tr>
					      <td>Favourbale Stone</td>
					      <th><?php echo $data_numerology->fav_stone; ?></th>
					    </tr>
					    <tr>
					      <td>Favourable Substone</td>
					      <th><?php echo $data_numerology->fav_substone; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Favourable God</td>
					      <th><?php echo $data_numerology->fav_god; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Favourable Metal</td>
					      <th><?php echo $data_numerology->fav_metal; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Favourable Color</td>
					      <th><?php echo $data_numerology->fav_color; ?></th>
					    </tr>
					    <tr>
					      <td scope="row">Favourable Mantra</td>
					      <th><?php echo $data_numerology->fav_mantra; ?></th>
					    </tr>
					    </tbody>
					</table>
				</div>
			</div> 	
		    <h4 class="mt-5"><?php echo $data_numerologyReport->title; ?></h4>
		    <p style="font-size: 18px;"><?php echo $data_numerologyReport->description; ?></p>
		  </div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron" style="background-color: white;">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/fast1.png') ?>" alt="..." style="height: 300px; width: 450px;">
				</div>
				<div class="col-12 col-md-5 p-5">
					<h3><?php echo $data_numerologyFastsReport->title ?></h3>
					<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyFastsReport->description ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3><?php echo $data_numerologyFavTime->title ?></h3>
					<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyFavTime->description ?>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/time.jpg') ?>" class="img-thumbnail" alt="..." style="height: 350px; width: 600px;">
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron" style="background-color: white;">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/gayatri.jpg') ?>" alt="..." style="height: 300px; width: 450px;">
				</div>
				<div class="col-12 col-md-5 p-5">
					<h3><?php echo $data_numerologyFavMantra->title ?></h3>
					<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyFavMantra->description; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3><?php echo $data_numerologyFavLord->title ?></h3>
					<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyFavLord->description ?>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/vishnu.jpg') ?>" class="img-thumbnail" alt="..." style="height: 350px; width: 600px;">
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron" style="background-color: white;">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/vastu.jpg') ?>" alt="..." style="height: 450px; width: 500px;">
				</div>
				<div class="col-12 col-md-5 p-5">
					<h3><?php echo $data_numerologyPlaceVastu->title ?></h3>
					<p class="mt-4" style="font-size: 20px;"><?php echo $data_numerologyPlaceVastu->description ?>
					</p>
				</div>
			</div>
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
					<button class="btn btn-primary"><span style="font-size: 26px;">Click Here</span></button>
				</div>	
			</div>
		</div>
	</div>
</section>-->
