<!DOCTYPE html>
<html>
<head>
	<title>Astrology</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
		<script src="<?php echo base_url('axxets/astrology/js/mapbox-sdk.min.js') ?>"></script>
  	<link rel="stylesheet" href="<?php echo base_url('axxets/astrology/css/autocomplete.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="panchangwidgetid"></div>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/astro.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css'); ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header') ?>



<!--body-->

<section>
	<div class="container mt-5">
		<div class="text-center">
			<h1>FREE DAILY HOROSCOPE</h1>
		</div>
		<div class="row mt-5">
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Aries')?>" name="aries"><img src="<?php echo base_url('axxets/astrology/img/aries1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Aries</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">21/3 - 19/4</p>-->
				</div>
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Taurus')?>"><img src="<?php echo base_url('axxets/astrology/img/taurus1.jpg') ?>" style="height: 60px;">
				</a>	
				<div class="text-center">
					<p>Taurus</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">20/4 - 20/5</p>-->
				</div>	
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Gemini')?>"><img src="<?php echo base_url('axxets/astrology/img/gemini1.jpg') ?>" style="height: 60px;">
				</a>	
				<div class="text-center">
					<p>Gemini</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">21/5 - 20/6</p>-->
				</div>	
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Cancer')?>"><img src="<?php echo base_url('axxets/astrology/img/cancer1.jpg') ?>" style="height: 60px;">
				</a>
				<div class="text-center">
					<p>Cancer</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">21/6 - 22/7</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Leo')?>"><img src="<?php echo base_url('axxets/astrology/img/leo1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Leo</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">23/7 - 22/8</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Virgo')?>"><img src="<?php echo base_url('axxets/astrology/img/virgo.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Virgo</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">23/8 - 22/9</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Libra')?>"><img src="<?php echo base_url('axxets/astrology/img/libra1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Libra</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">23/9 - 22/10</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Scorpio')?>"><img src="<?php echo base_url('axxets/astrology/img/scorpio1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Scorpio</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">23/10 - 21/11</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Sagittarius')?>"><img src="<?php echo base_url('axxets/astrology/img/sagittarius1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Sagittarius</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">22/11 - 21/12</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Capricorn')?>"><img src="<?php echo base_url('axxets/astrology/img/capricorn1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Capricorn</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">22/12 - 19/1</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">
				<a href="<?php echo site_url('Astrology/Aquarius')?>"><img src="<?php echo base_url('axxets/astrology/img/aquarius1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Aquarius</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">20/1 - 18/2</p>-->
				</div>		
			</div>
			<div class="col-4 col-md-1 mb-5">	
				<a href="<?php echo site_url('Astrology/Pisces')?>"><img src="<?php echo base_url('axxets/astrology/img/pisces1.jpg') ?>" style="height: 60px;"></a>
				<div class="text-center">
					<p>Pisces</p>
					<!--<p style="font-size: 10px;margin-top: -10px;">19/2 - 20/3</p>-->
				</div>		
			</div>
		</div> 
	</div>
</section>
<!--
<section>
	<div class="container">
		<div class="jumbotron jumbotron1">
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

<section>
	<div class="container mb-5">
		<div class="row">
			<div class="col-12 col-lg-7">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				  	<div class="row">
					  	 <div class="col-6 text-center" style="border-right: 1px solid black">
					  	 	<p style="font-size: 24px;"><i class="far fa-heart"></i></p>
					  	 	<p style="font-size: 20px;font-weight: 600;">Create Your Free Kundli</p>
					  	 	</div>
					  	 <div class="col-6 text-center">
					  	 	<p style="font-size: 24px;"><i class="far fa-compass"></i></p>
					  	 	<p style="font-size: 20px;font-weight: 600;">Free Horoscope Matching</p>
					  	 	</div>
					</div>  	 
				  </div>
				  <div class="card-body">
				  	<?php echo form_open('Astrology/basic_astro',['autocomplete'=>'off']); ?>
					<div class="row">
					    <?php $this->load->view('astrology/inc/FormInput') ?>
					  	<?php echo form_submit($data = array('type' => 'submit','value'=> 'Create Free Kundli','class'=> 'submit btn btn-primary btn-lg btn-block mt-3 ml-2')); ?>
					  </div>
					<!--</form>-->
					<?php echo form_close(); ?>
				  </div>
				</div>
			</div>
<?php
	$today = getdate();
/*print_r($today); 
$tz=timezone_open("Asia/Kolkata");
        $loc=timezone_location_get($tz);  
        print_r($loc);*/

 	$data_AdvPanchngSunRise=json_decode($responseData37);
 	$data_AdvPanchngSunRiseNext=json_decode($responseData37Next);
	//echo $responseData37Next."<br>";
	//echo $responseData37."<br>";
?>
			<div class="col-12 col-lg-5">
				<div class="card shadow-lg p-3 mb-5 bg-white rounded">
				  <div class="card-header" style="background-color: #5cbdb9;">
				    <h3>Today's Panchang</h3>
				    <div class="row">
				    	<div class="col-10">
				    		<p>Mumbai Maharashtra, India</p>
				    	</div>
				    	<div class="col-2">
				    		<i class="fas fa-map-marker-alt"></i>
				    	</div>
				    </div>	
				  </div>
				  <ul class="list-group list-group-flush">
    				<li class="list-group-item"><?php echo $weekday.",&nbsp;&nbsp;".$date."&nbsp;".$today['month']."&nbsp;&nbsp;".$year; ?></li>
    			  </ul>	
				   <ul class="list-group list-group-flush">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid grey">
    				 		<h6 class="mt-3 ml-4">MONTH</h6>
    				 		<p class="ml-4">Amanta : <?php echo $data_AdvPanchngSunRise->hindu_maah->amanta ; ?></p>
    				 		<p class="ml-4">Purnimanta : <?php echo $data_AdvPanchngSunRise->hindu_maah->purnimanta ; ?></p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4">SAMVAT</h6>
    				 		<p class="ml-4">Vikram : <?php echo $data_AdvPanchngSunRise->vikram_samvat."-".$data_AdvPanchngSunRise->vkram_samvat_name; ?></p>
    				 		<p class="ml-4">Shaka : <?php echo $data_AdvPanchngSunRise->shaka_samvat."-".$data_AdvPanchngSunRise->shaka_samvat_name; ?></p>
    					</div>
    				</div> 
    			  </ul>
    			  <ul class="list-group list-group-flush" style="border-top: 1px solid #E8E8E8">
    				<li class="list-group-item"><strong>TITHI :</strong> <span style="border: 1px solid #E8E8E8; padding: 4px;"> <?php echo $data_AdvPanchngSunRise->tithi->details->tithi_name; ?></span> 
    				&nbsp;&nbsp;&nbsp; till &nbsp;&nbsp;&nbsp; 
    					<span style="border: 1px solid #E8E8E8; padding: 4px;">
    						<?php 
					  				echo $data_AdvPanchngSunRise->tithi->end_time->hour.":".$data_AdvPanchngSunRise->tithi->end_time->minute.":".$data_AdvPanchngSunRise->tithi->end_time->second 
					  			?>
    					</span><br>
    					 <!--<small>Next : <?php echo $data_AdvPanchngSunRiseNext->tithi->details->tithi_name; ?></small>-->
    				</li>

    			  </ul>	
    			  <ul class="list-group list-group-flush">
    				<li class="list-group-item"><strong>NAKSHATRA :</strong> <span style="border: 1px solid #E8E8E8; padding: 4px;"> <?php echo $data_AdvPanchngSunRise->nakshatra->details->nak_name; ?></span> 
    				&nbsp;&nbsp;&nbsp; till &nbsp;&nbsp;&nbsp; 
    					<span style="border: 1px solid #E8E8E8; padding: 4px;">
    						<?php 
					  				echo $data_AdvPanchngSunRise->nakshatra->end_time->hour.":".$data_AdvPanchngSunRise->nakshatra->end_time->minute.":".$data_AdvPanchngSunRise->nakshatra->end_time->second 
					  			?>
    					</span><br>
    					<!--<small>Next : <?php echo $data_AdvPanchngSunRiseNext->nakshatra->details->nak_name; ?></small>-->
    				</li>
    			  </ul>
    			  <ul class="list-group list-group-flush">
				   	<div class="row">
				   		<div class="col-6" style="border-right: 1px solid grey">
    				 		<h6 class="mt-3 ml-4"><b>YOG</b></h6>
    				 		<p class="ml-4">
    				 			<?php echo $data_AdvPanchngSunRise->yog->details->yog_name; ?> 
    				 			till 
    				 			<?php 
					  				echo $data_AdvPanchngSunRise->yog->end_time->hour.":".$data_AdvPanchngSunRise->yog->end_time->minute.":".$data_AdvPanchngSunRise->yog->end_time->second 
					  			?>
					  			<br>
					  			<!--<small>Next : <?php echo $data_AdvPanchngSunRiseNext->yog->details->yog_name; ?> </small>-->
    				 		</p>
    					</div>
    					<div class="col-6">
    				 		<h6 class="mt-3 ml-4"><b>KARAN</b></h6>
    				 		<p class="ml-4">
    				 			<?php echo $data_AdvPanchngSunRise->karan->details->karan_name; ?> 
    				 			till 
    				 			<?php 
					  				echo $data_AdvPanchngSunRise->karan->end_time->hour.":".$data_AdvPanchngSunRise->karan->end_time->minute.":".$data_AdvPanchngSunRise->karan->end_time->second 
					  			?><br>
					  			<!--<small>Next : <?php echo $data_AdvPanchngSunRiseNext->karan->details->karan_name; ?> </small>-->
    				 		</p>
    					</div>
    				</div> 
    			  </ul>
    			  <a href="<?php echo site_url('Astrology/panchang')?>" style="text-decoration: none;">
    			  <div class="card-footer" style="color: black;background-color: #5cbdb9;">
    			  	<h2>Detailed Panchang&nbsp;&nbsp; <i class="fas fa-share"></i></h2>
    			  </div>
    			  </a>		
				</div>
			</div>
		</div>
	</div>
</section>
<script src="<?php echo base_url('axxets/astrology/js/autocomplete.js') ?>"></script>

<section>
	<div class="container mb-5">
		<h2 class="text-center">Vedic Astrology Calculator</h2>
		<div class="row">
			<div class="col-12 col-md-3 mt-4">
				<div class="card">
				<a  href="<?php echo site_url('Astrology/ascendant_input')?>" style="text-decoration: none;">
				  <div class="card-body">
				    <img src="<?php echo base_url('axxets/astrology/img/ascendantN.png') ?>" class="center" style="height: 100px;">
				    <p class="text-center">Ascendant Calculator</p>
				  </div>
				</a>
				</div>
			</div>
			<div class="col-12 col-md-3 mt-4">
				<div class="card">
				<a  href="<?php echo site_url('Astrology/gemstone_input')?>" style="text-decoration: none;">
				  <div class="card-body">
				    <img src="<?php echo base_url('axxets/astrology/img/gemstoneN.jpg') ?>"class="center" style="height: 100px;">
				    <p class="text-center">Gemstone Suggestion</p>
				  </div>
				 </a>
				</div>
			</div>
			<div class="col-12 col-md-3 mt-4">
				<div class="card">
				<a  href="<?php echo site_url('Astrology/rudraksha_input')?>" style="text-decoration: none;">
				  <div class="card-body">
				    <img src="<?php echo base_url('axxets/astrology/img/rudrakshaN.jpg') ?>"class="center" style="height: 100px;">
				    <p class="text-center">Rudraksha Suggestion</p>
				  </div>
				 </a>
				</div>
			</div>
			<div class="col-12 col-md-3 mt-4">
				<div class="card">
					<a  href="<?php echo site_url('Astrology/numerology_input')?>" style="text-decoration: none;">
				  <div class="card-body">
				    <img src="<?php echo base_url('axxets/astrology/img/numerologyN.png') ?>"class="center" style="height: 100px;">
				    <p class="text-center">Numerology For You</p>
				  </div>
				</a>
				</div>
			</div>
			<div class="col-12 col-md-3 mt-4">
				<div class="card">
				<a  href="<?php echo site_url('Astrology/kalsarpa_dasha_input')?>" style="text-decoration: none;">
				  <div class="card-body">
				    <img src="<?php echo base_url('axxets/astrology/img/kaalsarpaN.png') ?>"class="center" style="height: 100px;">
				    <p class="text-center">Kaalsarpa Dosha</p>
				  </div>
				 </a>
				</div>
			</div>
			<div class="col-12 col-md-3 mt-4">
				<div class="card">
				<a  href="<?php echo site_url('Astrology/Sadhesati_dosha_input')?>" style="text-decoration: none;">
				  <div class="card-body">
				    <img src="<?php echo base_url('axxets/astrology/img/sadhesatiN.png') ?>" style="height: 100px;">
				    <p class="text-center">Sadhesati Calculator</p>
				  </div>
				</a>
				</div>
			</div>
			<div class="col-12 col-md-3 mt-4">
				<div class="card">
					<a  href="<?php echo site_url('Astrology/pitri_dasha_input')?>" style="text-decoration: none;">
				  <div class="card-body">
				    <img src="<?php echo base_url('axxets/astrology/img/pitraN.png') ?>"class="center" style="height: 100px;">
				    <p class="text-center">Pitra Dosha Calculator</p>
				  </div>
				</a>
				</div>
			</div>
			<div class="col-12 col-md-3 mt-4">
				<div class="card">
					<a  href="<?php echo site_url('Astrology/manglik_dosha_input')?>" style="text-decoration: none;">
				  <div class="card-body">
				    <img src="<?php echo base_url('axxets/astrology/img/manglikN.png') ?>"class="center" style="height: 100px;">
				    <p class="text-center">Manglik Calculator</p>
				  </div>
				 </a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- testimonial -->
<section style="margin-top: 5%;">
  <div class="jumbotron testimonial" id="Testimonials" style="color: black; background-color: white">
    <div class="text-center">
    	<i class="fas fa-quote-left " style="font-size: 30px; color: #5b32b4;"></i>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators " style="margin-bottom: -40px;">
           <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"style="background-color: black; height: 10px;" ></li>
           <li data-target="#carouselExampleCaptions" data-slide-to="1"style="background-color: black;height: 10px;"></li>
           <li data-target="#carouselExampleCaptions" data-slide-to="2"style="background-color: black;height: 10px;"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
             <img class="shadow p-3 mb-5 mt-3 bg-white rounded carouse1" src="<?php echo base_url('axxets/astrology/img/1.png') ?>" alt="...">
              <div >
               <h5 class="carousel2" style="color: white">  I am connected with this organization since long time and I am happy with their service and support</h5>
               <h4  style="margin-top: 40px;color: #fb397d">Arundhati Nair</h4>
              </div>
            </div>
            <div class="carousel-item">
               <img class="shadow p-3 mb-5 mt-3 bg-white rounded carouse1" src="<?php echo base_url('axxets/astrology/img/2.png') ?>" alt="...">
              <div >
               <h5 class="carousel2" style="color: white">  I was getting confuse while selecting service but after one month</h5>
                <h5 style="color: white">our journey my confusion gets removed. Thanks team for better support and service.</h5>
               <h4  style="margin-top: 40px;color: #fb397d">Jaya Kumar</h4>
              </div>
            </div>
            <div class="carousel-item">
                <img class="shadow p-3 mb-5 mt-3 bg-white rounded carouse1" src="<?php echo base_url('axxets/astrology/img/1.png') ?>" alt="...">
              <div >
               <h5 class="carousel2" style="color: white">  Very good  service. As a distributor, I use this service for </h5>
                <h5 style="color: white">last one year and I am happy to say that it is easy, fast and secure to use this service.</h5>
                <h5 style="color: white"> I highly recommended every one.</h5>
               <h4  style="margin-top: 40px;color: #fb397d">karuna Nair</h4>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
