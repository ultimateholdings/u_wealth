<!DOCTYPE html>
<html>
<head>
	<title>Numerology</title>
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
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active">Numerology</li>
</ol>
<?php 
$today = getdate();
/*print_r($today); 
$tz=timezone_open("Asia/Kolkata");
        $loc=timezone_location_get($tz);  
        print_r($loc);*/

 ?>

<section>
	<div class="container mt-5">
		<div class="card shadow-lg p-3 mb-5 bg-white rounded">
			<div class="card-body">
				<div class="card-header" style="background-color: #5cbdb9;">
				<h4 class="ml-3">Numerology For you</h4>
				<p class="ml-3" style="font-size: 20px; color: white">Numerology is any belief in the divine or mystical relationship between a number and one or more coinciding events. It is also the study of the numerical value of the letters in words, names, and ideas. It is often associated with the paranormal, alongside astrology and similar divinatory arts.</p>
				</div>
				<div class="mt-5 mb-5" style="padding:0 20%;">	
					<?php echo form_open('astrology/numerology'); ?>
					<div class="row">
					    <div class="col-12">
					    	<div class="col-md-6 col-md-offset-3 text-center" style="float: none;display: block;margin: 0 auto 20px;">
					      		<label for="exampleFormControlSelect1">Language</label>
						    	<select class="form-control" id="exampleFormControlSelect1" name="lang">
						      		<option selected="" value="en">English</option>
						      		<option value="hi">हिंदी-Hindi</option>
						      		<option value="ta">தமிழ்-Tamil</option>
						      		<option value="te">తెలుగు-Telugu</option>
						      		<option value="ma">मराठी-Marathi</option>
						      		<option value="kn">ಮರಾಠಿ-Kannada</option>
						      		<option value="bn">মারাঠি-Bengali</option>
						    	</select>
							</div>
					      <label>Name</label>
					      <!--<input type="text" class="form-control" placeholder="First name">-->
					      <?php echo form_input($data=array('class'=>'form-control','name'=>'Name','placeholder'=>'First name','required'=>''));?>
					    </div>
					    <div class="col-4 mt-2">
					      <label>Date</label>
					      <!--<input type="date" class="form-control">-->
					       <?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'date','placeholder'=>'DD','min'=>1,'max'=>31,'required'=>''));?>
					    </div>
					    <div class="col-4 mt-2">
					      <label>Month</label>
					      <!--<input type="number" class="form-control" placeholder="Hour">-->
					      <?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'month','placeholder'=>'MM','min'=>1,'max'=>12,'required'=>''));?>
					    </div>
					    <div class="col-4 mt-2">
					      <label>Year</label>
					      <!--<input type="number" class="form-control" placeholder="Hour">-->
					      <?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'year','placeholder'=>'YYYY','min'=>1900,'max'=>$today['year'],'required'=>''));?>
					    </div>
					    
					  	<?php echo form_submit($data = array('type' => 'submit','value'=> 'Get Your Free Numerology Report Now','class'=> 'submit btn btn-primary btn-lg btn-block mt-3 ml-3')); ?>
					  </div>
					<!--</form>-->
					<?php echo form_close(); ?>
				</div>	
			</div>
		</div>
	</div>	
</section>

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/numerologyN.png')?>" class="img-thumbnail" alt="..." style="height: 400px; width: 550px;">
				</div>
				<div class="col-12 col-md-5 p-5">
					<h3>What is Numerology ?</h3>
					<p class="mt-4" style="font-size: 20px;">The word, “numerology,” is the science of numbers. The Numerology word comes from the Latin root, “numerus,” which means number and the Greek word, “logos,” which refers word or thought. These number-thoughts, or numerology is an ancient method of divination where numerical vibrations are charted in order to determine or predict the pattern of trends for the future.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron" style="background-color: white;">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3>Why Kundli Matching ?</h3>
					<p class="mt-4" style="font-size: 20px;">Once you learn how to use numerology successfully and implement it in your daily life you will soon see how it can guide you on a path to personal fulfillment and enjoyment. Numerology can be used to find a compatible partner, choose a career, determine your destiny and allows for full advantage of lucky days, events and years.

					</p>
					</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/numerology2.jpg') ?>" class="img-thumbnail" alt="..." style="height: 300px; width: 600px;">
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/numerology1.jpg') ?>" class="img-thumbnail" alt="..." style="height: 450px; width: 500px;">
				</div>
				<div class="col-12 col-md-5 p-5">
					<h3>How does Numerology work ?</h3>
					<p class="mt-4" style="font-size: 20px;">Numerology is a way of finding, through mathematics, the energies we are working within this lifetime. Through the numbers of our birth date and the numbers assigned to the letters of our name given at birth, numerology shows us our strengths, weaknesses and lessons or issues we are working with. By understanding those, we can make wiser conscious choices

					Numerology opens up a broader understanding of what’s going on, and; therefore, you can make wiser choices. You can heal. You can grow. That’s what numerology is there for: to help you heal and grow.</p>
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
