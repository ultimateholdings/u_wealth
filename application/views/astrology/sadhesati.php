<!DOCTYPE html>
<html>
<head>
	<title>Sadhesati</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/sadhesati.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/manglik.css'); ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/Sadhesati_dosha_input')?>" id="breadcrumbLink">Sadhesati</a></li>
  <li class="breadcrumb-item active">Sadhesati report</li>
</ol>

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/sadhesati1.jpg') ?>" class="img-thumbnail" alt="..." style="height: 400px; width: 500px;">
				</div>
				<div class="col-12 col-md-7 p-5">
					<h3>What is Sadhe sati ?</h3>
					<p class="mt-4" style="font-size: 20px;">
						<?php 
						$data_sadhesatiLifeDetails = json_decode($responseData201);
						$data_sadhesatiCurrentStatus = json_decode($responseData202);
						$data_sadhesatiRemedies = json_decode($responseData203);
					//echo $responseData203;//$data_sadhesati->conclusion; 
						echo $data_sadhesatiRemedies->what_is_sadhesati; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5 alert alert-info" role="alert">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/sadhesatiN.png') ?>" class="pb-5 d-none d-sm-block" height="180"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="font-size: 44px;" class="mt-4 alert-heading">Sadhesati</h2>
					<p><?php
					echo "<b>Consideration Date:</b>&nbsp;".$data_sadhesatiCurrentStatus->consideration_date;
					echo "<br><b>Moon Sign:</b>&nbsp;".$data_sadhesatiCurrentStatus->moon_sign;
					echo "<br><b>Saturn Sign:</b>&nbsp;".$data_sadhesatiCurrentStatus->saturn_sign;
					echo "<br><h3>".$data_sadhesatiCurrentStatus->is_undergoing_sadhesati."</h3>";
		//			echo $responseData203;
					?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container table-responsive mb-5">
		<table class="table table-striped" style="border: 1px solid #F0F0F0">
		  <thead>
		    <tr>
		      <th scope="col">Date</th>
		      <th scope="col">Moon Sign</th>
		      <th scope="col">Saturn Sign</th>
		      <th scope="col">Retro</th>
		      <th scope="col">Type</th>
		      <th scope="col">Summary</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($data_sadhesatiLifeDetails)): ?>
                <?php foreach ($data_sadhesatiLifeDetails as $row): ?>
		    <tr>
		      <td scope="row"><?php echo $row->date;?></td>
		      <td><?php echo $row->moon_sign;?></td>
		      <td><?php echo $row->saturn_sign;?></td>
		      <td><?php echo $row->is_saturn_retrograde;?></td>
		      <td><?php echo $row->type;?></td>
		      <td><?php echo $row->summary;?></td>
		    </tr>
		        <?php endforeach; ?>
              <?php endif; ?>
		  </tbody>
		</table>
	</div>
</section>

<section>
	<div class="container mb-5" style="font-size: 20px;">
		<div class="row">
			<h2 style="font-size: 44px;">Remedies for Sadhesati</h2>
		</div><hr class="bg-info" />
		<ul class="bullets next-line-pad list" style="padding-left: 25px">
			<?php foreach ($data_sadhesatiRemedies->remedies as $remedy):?>
			<li class="mt-3"><?php echo $remedy; ?></li>
			<?php endforeach;?>
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
