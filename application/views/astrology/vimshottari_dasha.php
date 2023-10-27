<!DOCTYPE html>
<html>
<head>
	<title>Vimshottari Dasha</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/vimshottari_dasha.css');?>"> -->
</head>
<body>
<?php $this->load->view('astrology/inc/header');
$currentVimDasha=json_decode($responseData9);
$currentVimDashaAll=json_decode($responseData10);
$majorVimDasha=json_decode($responseData11);
// echo $responseData9."<hr>";
// echo $responseData10."<hr>";
// echo $responseData11;
?>
<ol class="breadcrumb ">
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/astro_home')?>"  id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Astrology/ascendant_input')?>"  id="breadcrumbLink">Vimshottari Dasha</a></li>
  <li class="breadcrumb-item active">Vimshottari Dasha Report</li>
</ol>
<section>
	<div class="jumbotron mt-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3>What is Vimshottari Dasha ?</h3>
					<p class="mt-4" style="font-size: 20px;">
						Vimshottari Dasha is the most logical and accurate dasha system to predict the event of the past, future, and present of a person’s life such as your marital, career and health predictions. It can predict any event in an astrology chart. Vimshottari holds a fixed cyclic order planet’s Mahadasha. This system works on the basis of Nakshatras. It starts from birth until the end of a native’s life. Mahadasha and Antardasha are the two main categories of Vimshottari where Antardasha gives the more exact time whereas the first Mahadasha is predicted by the Nakshatra of Moon’s transiting at the birth time.

					</p>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/vimshottari_dasha.png') ?>" alt="..." style="height: 250px; width: 300px;">
				</div>
			</div>
		</div>
	</div>
</section>
<div class="row unmarg">
	<div class="col-6 ml-5 m-2">
		<div class="portlet-title margin-bottom-0 m-4">
			<div class="caption">
				<h3 class="caption-subject text-left">Vimshottari Dasha order</h3>
				<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, #1863bb 10%, #bb59f9 100%);background-size:100% 5px ;">
				</div>
			</div>
		</div>
		<center class="card-header">
			<div class="dasha-head">
				<p class="h4">Maha Dasha</p>
				<p id="current_dasha_major">
					<?php echo "<b>".$currentVimDasha->major->planet."</b> &nbsp;&nbsp;".$currentVimDasha->major->start." to ".$currentVimDasha->major->end  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Antar Dasha</p>
				<p id="current_dasha_minor">
					<?php echo "<b>".$currentVimDasha->minor->planet."</b> &nbsp;&nbsp;".$currentVimDasha->minor->start." to ".$currentVimDasha->minor->end  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Prtyantar Dasha</p>
				<p id="current_dasha_sub_minor">
					<?php echo "<b>".$currentVimDasha->sub_minor->planet."</b> &nbsp;&nbsp;".$currentVimDasha->sub_minor->start." to ".$currentVimDasha->sub_minor->end  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Sookshm Dasha</p>
				<p id="current_dasha_sub_sub_minor">
					<?php echo "<b>".$currentVimDasha->sub_sub_minor->planet."</b> &nbsp;&nbsp;".$currentVimDasha->sub_sub_minor->start." to ".$currentVimDasha->sub_sub_minor->end  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Pran Dasha</p>
				<p id="current_dasha_sub_sub_sub_minor">
					<?php echo "<b>".$currentVimDasha->sub_sub_sub_minor->planet."</b> &nbsp;&nbsp;".$currentVimDasha->sub_sub_sub_minor->start." to ".$currentVimDasha->sub_sub_sub_minor->end  ?> 
				</p>
			</div>
		</center>
	</div>
	<div class="col-5 m-2">
		<div class="portlet-title margin-bottom-0 m-4">
			<div class="caption">
				<h3 class="caption-subject text-left">Vimshottari Maha Dasha</h3>
				<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, #1863bb 10%, #bb59f9 100%);background-size:100% 5px ;">
				</div>
			</div>
		</div>
		<div class="table-scrollable table-scrollable-borderless mt-2">
			<table class="table table-hover table-light hidden-xs">
				<thead>
					<tr class="card-header">
						<th scope="row">Dasha Planet</th>
						<th scope="row">Start Date</th>
						<th scope="row">End Date</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($majorVimDasha as $value): ?>
					<tr>
						<td scope="row"><?php echo $value->planet; ?></td>
						<td scope="row"><?php echo $value->start; ?></td>
						<td scope="row"><?php echo $value->end; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


