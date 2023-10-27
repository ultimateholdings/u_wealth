<!DOCTYPE html>
<html>
<head>
	<title>Panchang</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/panchang.css') ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>


<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active">Panchang</li>
</ol>
<?php 
$today = getdate();
/*print_r($today); 
$tz=timezone_open("Asia/Kolkata");
        $loc=timezone_location_get($tz);  
        print_r($loc);*/

 ?>
<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="<?php echo base_url('axxets/astrology/img/panchang.png') ?>" class="pb-5 d-none d-sm-block" height="160" style="margin-top: -15px" >
				</div>
				<div class="col-12 col-md-8">
					<h2 class="mt-3" style="color: white;">Panchang for <?php echo $date."&nbsp;&nbsp;".$today['month'].",&nbsp;&nbsp;".$weekday; ?></h2>
				</div>
			</div>

			<!--<div class="container d-none d-sm-block" style="margin-top: -8px">
				<ul class="list-group list-group-horizontal">
				  <li class="list-group-item fest">TODAY'S FESTIVAL AND VRATS</li>
				  <li class="list-group-item">VINAYAKA CHATURTHI</li>
				  <li class="list-group-item">LALITA PANCHAMI</li>
				  <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				</ul>
			</div>-->
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo site_url('Astrology/Chaughadiya_muhurta')?>" style="text-decoration: none;">
					<div class="card card1 text-white mb-3" style="max-width: 15rem;">
				  		<div class="card-body text-center">
				    		<h2>Chaughadiya Muhurta</h2>
				  		</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">	
				<a  href="<?php echo site_url('Astrology/Hora_muhurta')?>" style="text-decoration: none;">
					<div class="card card1 text-white mb-3" style="max-width: 15rem;">
				  		<div class="card-body text-center">
				    		<h2>Hora Muhurta</h2>
				  		</div>
					</div>
				</a>
			</div>	
			<!--<div class="col-md-3">	
				<div class="card card1 text-white mb-3" style="max-width: 15rem;">
				  <div class="card-body text-center">
				    <h2>Monthly Panchang</h2>
				  </div>
				</div>
			</div>	
			<div class="col-md-3">	
				<div class="card card1 text-white mb-3" style="max-width: 15rem;">
				  <div class="card-body text-center">
				    <h2>Daily Panchang</h2>
				  </div>
				</div>
			</div>-->	
		</div>
	</div>		
</section>

<section>
	<div class="jumbotron mt-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3>What is Panchang ?</h3>
					<p class="mt-4" style="font-size: 20px;">The name Panchang is a Sanskrit Word. Panchang consists of two words "panch" means five and "ang" means parts these 5 parts are as follows: Tithi, Day, Nakshatra, Yog and Karan. The basic purpose of Hindu Panchang is to check various Hindu festivals and auspicious time and muhurta.

					</p>
					 <a href="#tag2" class="btn btn-primary mt-3 ml-3 float-left">Get Today's Panchang</a>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/panchang1.png') ?>" alt="..." style="height: 250px; width: 300px;">
				</div>
			</div>
		</div>
	</div>
</section>
<?php $data_AdvPanchngSunRise=json_decode($responseData37);
$data_AdvPanchngSunRiseNext=json_decode($responseData37Next);
	//echo $responseData37Next."<br>";
?>
<section id="tag2">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Today's Panchang</h3>
				    <div class="row">
				    	<div class="col-10">
				    		<p>Ayana - <strong><?php echo $data_AdvPanchngSunRise->ayana ; ?></strong></p>
				    		<h4><?php echo $data_AdvPanchngSunRise->ritu ; ?> Ritu</h4>
				    	</div>
				    	<div class="col-2">
				    		<i class="fas fa-seedling" style="font-size: 40px;"></i>
				    	</div>
				    </div>	
				  </div>
				  <ul class="list-group list-group-flush">
    				<li class="list-group-item"><?php echo $weekday.",&nbsp;&nbsp;".$date."&nbsp;".$today['month']."&nbsp;&nbsp;".$year; ?></li>
    			  </ul>	
				   <ul class="list-group list-group-flush">
				   	<div class="row">
				   		<div class="col-3" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Sunrise</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->sunrise ; ?></p>
    					</div>
    					<div class="col-3" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Sunset</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->sunset ; ?></p>
    					</div>
    					<div class="col-3" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Moonrise</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moonrise ; ?></p>
    					</div>
    					<div class="col-3">
    				 		<h6 class="mt-3 ml-4">Moonset</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moonset ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Hindu Sunrise</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->vedic_sunrise ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Hindu Sunset</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->vedic_sunset ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Sun Sign</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->sun_sign ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Moon Sign</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moon_sign ; ?></p>
    					</div>
    				</div> 
    			  </ul>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Panchang Element</h3>	
				  </div>
				  	<dl class="row mt-4">
					  <dt class="col-sm-3">Tithi</dt>
					  <dd class="col-sm-9">
					  	<p style="margin-bottom: -5px;">
					  		<strong>
					  			<?php echo $data_AdvPanchngSunRise->tithi->details->tithi_name; ?>
					  		</strong> 
					  		upto 
					  		<strong>
					  			<?php 
					  				echo $data_AdvPanchngSunRise->tithi->end_time->hour.":".$data_AdvPanchngSunRise->tithi->end_time->minute.":".$data_AdvPanchngSunRise->tithi->end_time->second 
					  			?>
					    	</strong>
						</p>
					  <small>Next : <?php echo $data_AdvPanchngSunRiseNext->tithi->details->tithi_name; ?></small>
					  </dd>

					  <dt class="col-sm-3 mt-4">Nakshatra</dt>
					  <dd class="col-sm-9 mt-4">
					  	<p style="margin-bottom: -5px;">
					  		<strong>
					  			<?php echo $data_AdvPanchngSunRise->nakshatra->details->nak_name; ?> 
					  		</strong>
					  		 upto 
					  		<strong>
					  		 	<?php 
					  				echo $data_AdvPanchngSunRise->nakshatra->end_time->hour.":".$data_AdvPanchngSunRise->nakshatra->end_time->minute.":".$data_AdvPanchngSunRise->nakshatra->end_time->second 
					  			?>
					  		</strong>
					  	</p>
					  <small>Next : <?php echo $data_AdvPanchngSunRiseNext->nakshatra->details->nak_name; ?></small>
					  </dd>

					  <dt class="col-sm-3 mt-4">Yog</dt>
					  <dd class="col-sm-9 mt-4">
					  	<p style="margin-bottom: -5px;">
					  		<strong>
					  			<?php echo $data_AdvPanchngSunRise->yog->details->yog_name; ?> 
					  		</strong> 
					  		upto 
					  		<strong>
					  			<?php 
					  				echo $data_AdvPanchngSunRise->yog->end_time->hour.":".$data_AdvPanchngSunRise->yog->end_time->minute.":".$data_AdvPanchngSunRise->yog->end_time->second 
					  			?>
					  		</strong>
					  	</p>
					  <small>Next : <?php echo $data_AdvPanchngSunRiseNext->yog->details->yog_name; ?> </small>
					  </dd>

					 <dt class="col-sm-3 mt-4">Karan</dt>
					  <dd class="col-sm-9 mt-4">
					  	<p style="margin-bottom: -5px;">
					  		<strong>
					  		<?php echo $data_AdvPanchngSunRise->karan->details->karan_name; ?>  
					  		</strong> 
					  		upto 
					  		<strong>
					  			<?php 
					  				echo $data_AdvPanchngSunRise->karan->end_time->hour.":".$data_AdvPanchngSunRise->karan->end_time->minute.":".$data_AdvPanchngSunRise->karan->end_time->second 
					  			?>
					  		</strong>
					  	</p>
					  <small>Next : <?php echo $data_AdvPanchngSunRiseNext->karan->details->karan_name; ?> </small>
					  </dd>
					</dl>
				</div>	
			</div>

			<div class="col-12 col-lg-6">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Hindu Month and Year</h3>	
				  </div>
				  	<ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Vikram Samvat</h6>
    				 		<p class="ml-4">
    				 			<?php echo $data_AdvPanchngSunRise->vikram_samvat."-".$data_AdvPanchngSunRise->vkram_samvat_name; ?>
    				 		</p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Shaka Samvat</h6>
    				 		<p class="ml-4">
    				 			<?php echo $data_AdvPanchngSunRise->shaka_samvat."-".$data_AdvPanchngSunRise->shaka_samvat_name; ?>
    				 		</p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Paksha</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->paksha ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Ayana</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->ayana ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Purnimanta</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->hindu_maah->purnimanta ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Amanta</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->hindu_maah->amanta ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Sun Sign</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->sun_sign ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Moon Sign</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moon_sign ; ?></p>
    					</div>
    				</div> 
    			  </ul>
				</div>	
			</div>

			<div class="col-12 col-lg-6">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Other Yoga</h3>	
				  </div>
				  
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
    				<li class="list-group-item"><?php echo $weekday.",&nbsp;&nbsp;".$date."&nbsp;".$today['month']."&nbsp;&nbsp;".$year; ?></li>
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4"> Other Panchang Yoga</h6>
    					</div>
    					<div class="col-6">
							  <dd class="col-sm-9">
							  	<p style="margin-bottom: -5px;">
							  		<strong>
							  			<?php echo $data_AdvPanchngSunRise->panchang_yog ; ?>
							  		</strong> 
							   	</p>
							  </dd>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Disha Shool</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->disha_shool ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">Nakshatra Shool</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->nak_shool->direction ; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8;">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid #E8E8E8">
    				 		<h6 class="mt-3 ml-4">Moon Nivash</h6>
    				 		<p class="ml-4"><?php echo $data_AdvPanchngSunRise->moon_nivas ; ?></p>
    					</div>
    				</div> 
    			  </ul>
				</div>	
			</div>
		</div>
	</div>
</section>
