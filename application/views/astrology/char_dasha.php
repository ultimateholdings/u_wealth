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
</head>
<body>
<?php $this->load->view('astrology/inc/header');
$currentCharDasha=json_decode($responseData15);
$majorCharDasha=json_decode($responseData16);
// echo $responseData15."<hr>";
// echo $responseData16."<hr>";
// echo $responseData17."<hr>";
// echo $responseData18;
?>
<ol class="breadcrumb ">
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/astro_home')?>"  id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/char_dasha_input')?>"  id="breadcrumbLink">Char Dasha</a></li>
  <li class="breadcrumb-item active">Char Dasha Report</li>
</ol>
<section>
	<div class="jumbotron mt-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3>What is Char Dasha ?</h3>
					<p class="mt-4" style="font-size: 20px;">
						According to Vedic astrology, Jamini Chara dashas are dashas based on signs than planets. They are sign based on time periods. It is also known as Rashi Dasha. Chara’s are used to predict the astrological purpose. The Chara dasha is predicted through the position of Karakas ( 7 Chara Karakas) that is Amatya, Bhratri, Matri, Putra, Gnati and Dara karaka.

					</p>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/char_dasha.png') ?>" alt="..." style="height: 250px; width: 300px;">
				</div>
			</div>
		</div>
	</div>
</section>
<div class="row unmarg">
	<div class="col-6 ml-5 mt-2">
		<div class="portlet-title margin-bottom-0 m-4">
			<div class="caption">
				<h3 class="caption-subject text-left">Char Dasha order</h3>
				<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, #1863bb 10%, #bb59f9 100%);background-size:100% 5px ;">
				</div>
			</div>
		</div>
		<center class="card-header">
			<div class="dasha-head">
				<p class="h4">Maha Dasha</p>
				<p id="current_dasha_major">
					<?php echo "<b>".$currentCharDasha->major_dasha->sign_name."</b> &nbsp;&nbsp;".$currentCharDasha->major_dasha->start_date." to ".$currentCharDasha->major_dasha->end_date  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Antar Dasha</p>
				<p id="current_dasha_minor">
					<?php echo "<b>".$currentCharDasha->sub_dasha->sign_name."</b> &nbsp;&nbsp;".$currentCharDasha->sub_dasha->start_date." to ".$currentCharDasha->sub_dasha->end_date  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Prtyantar Dasha</p>
				<p id="current_dasha_sub_minor">
					<?php echo "<b>".$currentCharDasha->sub_sub_dasha->sign_name."</b> &nbsp;&nbsp;".$currentCharDasha->sub_sub_dasha->start_date." to ".$currentCharDasha->sub_sub_dasha->end_date  ?> 
				</p>
			</div>
			<!-- <div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Sookshm Dasha</p>
				<p id="current_dasha_sub_sub_minor">
					<?php echo "<b>".$currentCharDasha->sub_sub_sub_dasha->sign_name."</b> &nbsp;&nbsp;".$currentCharDasha->sub_sub_sub_dasha->start_date." to ".$currentCharDasha->sub_sub_sub_dasha->end_date  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Pran Dasha</p>
				<p id="current_dasha_sub_sub_sub_minor">
					<?php echo "<b>".$currentCharDasha->sub_sub_sub_sub_dasha->sign_name."</b> &nbsp;&nbsp;".$currentCharDasha->sub_sub_sub_sub_dasha->start_date." to ".$currentCharDasha->sub_sub_sub_sub_dasha->end_date  ?> 
				</p>
			</div> -->
		</center>
	</div>
	<div class="col-5 ml-5 m-2">
		<div class="portlet-title margin-bottom-0 m-4">
			<div class="caption">
				<h3 class="caption-subject text-left">Char Maha Dasha</h3>
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
					<?php foreach($majorCharDasha as $value): ?>
					<tr>
						<td scope="row"><?php echo $value->sign_name; ?></td>
						<td scope="row"><?php echo $value->start_date; ?></td>
						<td scope="row"><?php echo $value->end_date; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


