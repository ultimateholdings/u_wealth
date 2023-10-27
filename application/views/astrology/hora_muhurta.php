<!DOCTYPE html>
<html>
<head>
	<title>Hora Muhurta</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/hora_muhurta.css'); ?>">
	
</head>
<body>

<?php $this->load->view('astrology/inc/header'); ?>

<!--body-->


<?php 
$today = getdate();
/*print_r($today); 
$tz=timezone_open("Asia/Kolkata");
        $loc=timezone_location_get($tz);  
        print_r($loc);*/
date_default_timezone_set("Africa/Douala");

$data_horomuhurta=json_decode($responseData48);
	//echo $responseData48."<br>";
?>
<section>
	<div class="jumbotron jumbotron2 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Hora For <?php echo $weekday ?></h2>
					<p style="color: yellow;"><?php echo $date."&nbsp;&nbsp;".$today['month']."&nbsp;&nbsp;".$year.",&nbsp;&nbsp;".date("h:i A"); ?></p>
					<p style="margin-top: -16px;color: yellow;">Mumbai, Maharashtra, India</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container my-5">
		<h5>The following Hora Muhurta are shown for the date <?php echo $weekday.",&nbsp;&nbsp;".$date."&nbsp;&nbsp;".$today['month']."&nbsp;&nbsp;".$year.",&nbsp;&nbsp;".date("h:i A"); ?> and place "Mumbai, Maharashtra, India". These Panchang calculations are based on Drik Ganit i.e. current sidereal positions of planets in the sky. The Ayanamsha used is Lahiri or Chitrapakshiya. The current day sunrise is taken as the time to calculate planet positions and accordingly other drika panchang calculations.</h5>
		<div class="row mt-5">
			<div class="col-md-6">
				<div class="card text-center" style="width: 22rem;">
				  <div class="card-header"style="background-color: #5cbdb9;color: white;font-size: 22px;">Day Hora</div>
					<ul class="list-group list-group-flush" id="li">
						<?php foreach ($data_horomuhurta->hora->day as $d=>$dayHora):?>
						<li class="list-group-item">
							<strong><?php echo $dayHora->hora ?></strong>
							&nbsp;&nbsp;&nbsp;<?php echo $dayHora->time ?>
						</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card text-center" style="width: 22rem;">
				  <div class="card-header"  style="background-color: #5cbdb9;color: white;font-size: 22px;">Night Hora</div>
					<ul class="list-group list-group-flush" id="li">
						<?php foreach ($data_horomuhurta->hora->night as $n=>$nightHora):?>
						<li class="list-group-item">
							<strong><?php echo $nightHora->hora ?></strong>
							&nbsp;&nbsp;&nbsp;<?php echo $nightHora->time ?>
						</li>
						<?php endforeach;?>
					</ul>
				</div>  
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<h1 class="mt-5">About Hora Muhurta</h1>
		<h5 style="font-weight: 400">The horas are auspicious for certain activities and inauspicious for others according to the nature of these planets. Planning the day according to the horas and avoiding unlucky activity during the connected hora reduces the chances of bad results.</h5>
		<div class="row my-5">
			<div class="col-md-3">
				<a  href="<?php echo site_url('Astrology/Hora_muhurta')?>" style="text-decoration: none;">
					<div class="card card1 text-white mb-3" style="max-width: 15rem;">
				  		<div class="card-body text-center">
				    		<h2>Hora Muhurta</h2>
				  		</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">	
				<a href="<?php echo site_url('Astrology/Chaughadiya_muhurta')?>" style="text-decoration: none;">
					<div class="card card1 text-white mb-3" style="max-width: 15rem;">
				  		<div class="card-body text-center">
				    		<h2>Chaughadiya Muhurta</h2>
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


<!-- testimonial -->
<section style="margin-top: 5%;">
  <div class="jumbotron jumbotron2 testimonial" id="Testimonials" style="color: black; background-color: white">
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

<!--testimonial End -->
