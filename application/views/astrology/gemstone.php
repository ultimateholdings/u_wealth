<!DOCTYPE html>
<html>
<head>
	<title>Gemstone report</title>
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
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/gemstone_input')?>" id="breadcrumbLink">Gemstone</a></li>
  <li class="breadcrumb-item active">Gemstone report</li>
</ol>
<section>
	<div class="container mt-5 mb-5">
		<?php $data_gemstone=json_decode($responseData24);
				    	//echo $responseData24; 
				    ?>
		<div class="row">
			<div class="col-md-4">
				<h3>Your Life Stone</h3>
				<div class="card" style="width: 18rem;">
				  <!--<img src="saphire.jpg" class="card-img-top" alt="..." >-->
				  <div class="card-body bg-info">
				    <h5 class="card-title"><?php echo $data_gemstone->LIFE->name; ?></h5>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"></li>
				    <li class="list-group-item"><span class="float-left">Substitue</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->semi_gem; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Finger</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->wear_finger; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Weight</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->weight_caret; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Day</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->wear_day; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Deity</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->gem_deity; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Metal</span><span class="float-right"style="color: #0067A5;"><?php echo $data_gemstone->LIFE->wear_metal; ?></span></li>
				  </ul>
				</div>
			</div>
			<div class="col-md-4">
				<h3>Your Benefic Stone</h3>
				<div class="card" style="width: 18rem;">
				  <!--<img src="coral.png" class="card-img-top" alt="..." style="height: 220px;">-->
				  <div class="card-body bg-info">
				    <h5 class="card-title"><?php echo $data_gemstone->BENEFIC->name; ?></h5>
				  
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"></li>
				    <li class="list-group-item"><span class="float-left">Substitue</span><span class="float-right" style="color: red;"><?php echo $data_gemstone->BENEFIC->semi_gem; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Finger</span><span class="float-right"style="color: red;"><?php echo $data_gemstone->BENEFIC->wear_finger; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Weight</span><span class="float-right"style="color: red;"><?php echo $data_gemstone->BENEFIC->weight_caret; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Day</span><span class="float-right"style="color: red;"><?php echo $data_gemstone->BENEFIC->wear_day; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Deity</span><span class="float-right"style="color: red;"><?php echo $data_gemstone->BENEFIC->gem_deity; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Metal</span><span class="float-right"style="color: red;"style="color: red;"><?php echo $data_gemstone->BENEFIC->wear_metal; ?></span></li>
				   </ul>
				</div>
			</div>
			<div class="col-md-4">
				<h3>Your Lucky Stone</h3>
				<div class="card" style="width: 18rem;">
				  <!--<img src="ruby.png" class="card-img-top" alt="..." style="height: 220px;">-->
				  <div class="card-body bg-info">
				    <h5 class="card-title"><?php echo $data_gemstone->LUCKY->name; ?></h5>
				  
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"></li>
				    <li class="list-group-item"><span class="float-left">Substitue</span><span class="float-right" style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->semi_gem; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Finger</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->wear_finger; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Weight</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->weight_caret; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Day</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->wear_day; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Deity</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->gem_deity; ?></span></li>
				    <li class="list-group-item"><span class="float-left">Metal</span><span class="float-right"style="color: #E0115F;"><?php echo $data_gemstone->LUCKY->wear_metal; ?></span></li>
				   </ul>
				</div>
			</div>
		</div>
	</div>
</section>

<!--
<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="saphire.jpg" class="pb-5 d-none d-sm-block" height="160"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Your Life stone</h2>
					<h4 style="color: yellow">Yellow Saphire</h4>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container"> 
		 <div>
		 	<h4>Metal Weight</h4>
		 	<p>Yellow Sapphire should weigh more than 3 carats and should not weigh 6, 11 or 15 carats. It should be set in gold ring. The ring should be made such that the stone touches skin.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Time</h4>
		 	<p>Yellow Sapphire should be worn on a Thursday morning of the bright half of lunar month.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Rituals</h4>
		 	<p>Before wearing the Yellow Sapphire it one should keep the ring immersed in unboiled milk or ganges water for sometime.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Mantra</h4>
		 	<p>Once the energizing rituals are completed one must worship stone with flower and incense. For Yellow Sapphire following mantra to be recited 108 times.</p>
		 	<p class="text-center">।। ॐ ग्रां ग्रीं ग्रौं सः गुरवे नमः  ।।</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Mantra</h4>
		 	<p>Once the energizing rituals are completed one must worship stone with flower and incense. For Yellow Sapphire following mantra to be recited 108 times.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Substitutes</h4>
		 	<p>One can also use the substitutes for Yellow Sapphire like Yellow Perl, Yellow Zircon, Yellow Tourmaline, Topaz and Citrine (Quartz Topaz).</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Caution</h4>
		 	<p>One should take care that Yellow Sapphire should not be worn with Diamond, Blue Sapphire, Gomedha and Cat's Eye.</p>
		 </div>
	</div>
</section>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="coral.png" class="pb-5 d-none d-sm-block" height="200"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Your Benefic stone</h2>
					<h4 style="color: yellow">Red Coral</h4>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container"> 
		 <div>
		 	<h4>Metal Weight</h4>
		 	<p>Red Coral should weigh more than 6 carats. It should be set in gold ring mixed with copper. The ring should be made such that the stone touches skin.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Time</h4>
		 	<p>Red Coral should be worn on a Tuesday morning one hour after Sunrise on the bright half of lunar month.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Rituals</h4>
		 	<p>Before wearing the Red Coral it one should keep the ring immersed in unboiled milk or ganges water for sometime.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Mantra</h4>
		 	<p>Once the energizing rituals are completed one must worship stone with flower and incense. For Red Coral following mantra to be recited 108 times.</p>
		 	<p class="text-center">।। ॐ क्रां क्रीं क्रौं सः भौमाय नमः ।।</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Substitutes</h4>
		 	<p>One can also use the substitutes for Red Coral like Sang Moongi, Carnelian and Red Jasper.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Caution</h4>
		 	<p>One should take care that Red Coral should not be worn with Emerald, Diamond, Blue Sapphire, Gomedha and Cat's Eye and their substitutes.</p>
		 </div>
	</div>
</section>

<section>
	<div class="jumbotron jumbotron1 mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<img src="ruby.png" class="pb-5 d-none d-sm-block" height="200"  >
				</div>
				<div class="col-12 col-md-8">
					<h2 style="color: white; font-size: 44px;">Your Lucky stone</h2>
					<h4 style="color: yellow">Ruby</h4>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container"> 
		 <div>
		 	<h4>Metal Weight</h4>
		 	<p>Flawless ruby should be worned with least 2-1/2 carats in weight. It should be set in the ring of gold mixed with copper. The ring should be made such that the stone touches skin.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Time</h4>
		 	<p>Ruby should worn after Sunday sunrise of the bright half of the lunar month.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Rituals</h4>
		 	<p>Before wearing the it one should keep the ring immersed in unboiled milk or ganges water for sometime.</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Mantra</h4>
		 	<p>Once the energizing rituals are completed one must worship stone with flower and incense. For Ruby following mantra to be recited 108 times.</p>
		 	<p class="text-center">।। ॐ ह्रां ह्रीं ह्रौं सः सूर्याय नमः ।।</p>
		 </div>
		 <div class="mt-5">
		 	<h4>Substitutes</h4>
		 	<p>One can also use the substitutes for ruby like Red Spined, Star Ruby, Pyrope Garnet, Red Zircon or Red Tourmaline.</p>
		 </div>
		 <div class="mt-5 mb-5">
		 	<h4>Caution</h4>
		 	<p>One should take care that ruby should not be worn with Diamond, Blue Sapphire, Gomedha and Cat's Eye and their substitutes.</p>
		 </div>
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
</section>-->

	