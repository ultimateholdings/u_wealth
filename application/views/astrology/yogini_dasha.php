<!DOCTYPE html>
<html>
<head>
	<title>Yogini Dasha</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/yogini.css');?>"> -->
</head>
<body>
<?php $this->load->view('astrology/inc/header');
$currentYoginiDasha=json_decode($responseData12);
$majorYoginiDasha=json_decode($responseData13);
$subYoginiDasha=json_decode($responseData14);
// echo $responseData12."<hr>";
// echo $responseData13."<hr>";
// echo $responseData14;
?>
<ol class="breadcrumb ">
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/astro_home')?>"  id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/yogini_Dasha_input')?>"  id="breadcrumbLink">Yogini Dasha</a></li>
  <li class="breadcrumb-item active">Yogini Dasha Report</li>
</ol>
<section>
	<div class="jumbotron mt-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 p-5">
					<h3>What is Yogini Dasha ?</h3>
					<p class="mt-4" style="font-size: 20px;">
						Just like Vimshottari, Yogini Dasha is also an important dasha of Vedic astrology. In this also the Nakshatra dasha is based on the position of the moon. Each is assigned to the Yogini while each has corresponding node or planets. There are a total of 8 Yoginis while Ketu does not play a role here. 36 years is the total period of Yogini Dasha. To interpret Yogini dasha, the strength of the planets are very important.

					</p>
				</div>
				<div class="col-12 col-md-5 mt-5">
					<img src="<?php echo base_url('axxets/astrology/img/yogini_dasha.png') ?>" alt="..." style="height: 250px; width: 300px;">
				</div>
			</div>
		</div>
	</div>
</section>
<div class="row unmarg">
	<div class="col-6 ml-5 mt-2">
		<div class="portlet-title margin-bottom-0 m-4">
			<div class="caption">
				<h3 class="caption-subject text-left">Yogini Dasha order</h3>
				<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, #1863bb 10%, #bb59f9 100%);background-size:100% 5px ;">
				</div>
			</div>
		</div>
		<center class="card-header">
			<div class="dasha-head">
				<p class="h4">Maha Dasha</p>
				<p id="current_dasha_major">
					<?php echo "<b>".$currentYoginiDasha->major_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->major_dasha->start_date." to ".$currentYoginiDasha->major_dasha->end_date  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Antar Dasha</p>
				<p id="current_dasha_minor">
					<?php echo "<b>".$currentYoginiDasha->sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_dasha->start_date." to ".$currentYoginiDasha->sub_dasha->end_date  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Prtyantar Dasha</p>
				<p id="current_dasha_sub_minor">
					<?php echo "<b>".$currentYoginiDasha->sub_sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_sub_dasha->start_date." to ".$currentYoginiDasha->sub_sub_dasha->end_date  ?> 
				</p>
			</div>
			<!-- <div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Sookshm Dasha</p>
				<p id="current_dasha_sub_sub_minor">
					<?php echo "<b>".$currentYoginiDasha->sub_sub_sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_sub_sub_dasha->start_date." to ".$currentYoginiDasha->sub_sub_sub_dasha->end_date  ?> 
				</p>
			</div>
			<div class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</div>
			<div class="dasha-head">
				<p class="h4">Pran Dasha</p>
				<p id="current_dasha_sub_sub_sub_minor">
					<?php echo "<b>".$currentYoginiDasha->sub_sub_sub_sub_dasha->dasha_name."</b> &nbsp;&nbsp;".$currentYoginiDasha->sub_sub_sub_sub_dasha->start_date." to ".$currentYoginiDasha->sub_sub_sub_sub_dasha->end_date  ?> 
				</p>
			</div> -->
		</center>
	</div>
	<div class="col-5 m-2">
		<div class="portlet-title margin-bottom-0 m-4">
			<div class="caption">
				<h3 class="caption-subject text-left">Yogini Maha Dasha</h3>
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
						<!-- <th scope="row">Duration(Years)</td> -->
					</tr>
				</thead>
				<tbody>
					<?php foreach($majorYoginiDasha as $value): ?>
					<tr>
						<td scope="row"><?php echo $value->dasha_name; ?></td>
						<td scope="row"><?php echo $value->start_date; ?></td>
						<td scope="row"><?php echo $value->end_date; ?></td>
						<!-- <td scope="row"><?php echo $value->duration; ?></td> -->
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


