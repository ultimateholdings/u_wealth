<!DOCTYPE html>
<html>
<head>
	<title>Kundli PDF</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/kundli_matching.css'); ?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header');
$maleFemaleData=json_decode($details);
$birthDetails=json_decode($responseData50);
$astroDetails=json_decode($responseData52);
$ashtakootPoints=json_decode($responseData53);
$matchMakingReport=json_decode($responseData54);
$matchSimpleReport=json_decode($responseData57);

// echo $details;
// echo $maleFemaleData->maleBirthData->second;

?>

<div class="col-md-8 col-sm-7 col-xs-12 ">
	<div class="cta" style="padding-top: 10px">
		<h2 class="col-xs-12 unmarg text-capitalize">
			<?php echo $maleFemaleData->maleBirthData->name." with "
					.$maleFemaleData->femaleBirthData->name
			 ?>
		</h2>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<h4 class="unmarg">
						<?php 
							echo $maleFemaleData->maleBirthData->date."-"
									.$maleFemaleData->maleBirthData->month."-"
									.$maleFemaleData->maleBirthData->year;
							?>&nbsp;&nbsp;
						<?php 
								echo $maleFemaleData->maleBirthData->hour." : "
									.$maleFemaleData->maleBirthData->minute." : "
									.$maleFemaleData->maleBirthData->second;
							?>&nbsp;&nbsp;
						<span class="text-ellipsis"> 
							<?php echo $maleFemaleData->maleBirthData->place ?>		
						</span>
					</h4>
				</div>
 			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<h4 class="unmarg">
						<?php 
							echo $maleFemaleData->femaleBirthData->date."-"
									.$maleFemaleData->femaleBirthData->month."-"
									.$maleFemaleData->femaleBirthData->year;
							?>&nbsp;&nbsp;
						<?php 
								echo $maleFemaleData->femaleBirthData->hour." : "
									.$maleFemaleData->femaleBirthData->minute." : "
									.$maleFemaleData->femaleBirthData->second;
							?>&nbsp;&nbsp;
						<span class="text-ellipsis"> 
							<?php echo $maleFemaleData->femaleBirthData->place ?>		
						</span>
					</h4>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="portlet-title margin-bottom-0 m-4">
	<div class="caption">
		<h3 class="caption-subject text-left">Birth Details</h3>
		<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, #1863bb 10%, #bb59f9 100%);background-size:100% 5px ;">
		</div>
	</div>
</div>
<div class="row unmarg m-4">
	<div class="col-6 m-3">
		<div class="table-scrollable table-scrollable-borderless table-bordered">
			<table class="table table-hover  table-light">
				<thead>
					<tr>
						<th class="text-center text-primary">Male</th>
						<th class="text-center text-muted">Birth Details</th>
						<th class="text-center text-info">Female</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $birthDetails->male_astro_details->day."/"
									.$birthDetails->male_astro_details->month."/"
									.$birthDetails->male_astro_details->year;
							?>
						</td>
						<td class="text-bold-600" align="center">Date of Birth</td>
						<td align="center" class="text-info">
							<?php 
								echo $birthDetails->female_astro_details->day."/"
									.$birthDetails->female_astro_details->month."/"
									.$birthDetails->female_astro_details->year;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $birthDetails->male_astro_details->hour." : "
									.$birthDetails->male_astro_details->minute;
							?>
						</td>
						<td class="text-bold-600" align="center">Birth Time</td>
						<td align="center" class="text-info">
							<?php 
								echo $birthDetails->female_astro_details->hour." : "
									.$birthDetails->female_astro_details->minute;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $birthDetails->male_astro_details->latitude;
							?>
						</td>
						<td class="text-bold-600" align="center">Latitude</td>
						<td align="center" class="text-info">
							<?php 
								echo $birthDetails->female_astro_details->latitude;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $birthDetails->male_astro_details->longitude;
							?>
						</td>
						<td class="text-bold-600" align="center">Longitude</td>
						<td align="center" class="text-info">
							<?php 
								echo $birthDetails->female_astro_details->longitude;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $birthDetails->male_astro_details->timezone;
							?>
						</td>
						<td class="text-bold-600" align="center">Timezone</td>
						<td align="center" class="text-info">
							<?php 
								echo $birthDetails->female_astro_details->timezone;
							?>
						</td>
	 				</tr>
	 				<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $birthDetails->male_astro_details->sunrise;
							?>
						</td>
						<td class="text-bold-600" align="center">Sunrise</td>
						<td align="center" class="text-info">
							<?php 
								echo $birthDetails->female_astro_details->sunrise;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $birthDetails->male_astro_details->sunset;
							?>
						</td>
						<td class="text-bold-600" align="center">Sunset</td>
						<td align="center" class="text-info">
							<?php 
								echo $birthDetails->female_astro_details->sunset;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo round($birthDetails->male_astro_details->ayanamsha, 2);
							?>
						</td>
						<td class="text-bold-600" align="center">Ayanamsha</td>
						<td align="center" class="text-info">
							<?php 
								echo round($birthDetails->female_astro_details->ayanamsha, 2);
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $astroDetails->male_astro_details->Varna;
							?>
						</td>
						<td class="text-center text-bold-600">Varna</td>
						<td align="center" class="text-info">
							<?php 
								echo $astroDetails->female_astro_details->Varna;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $astroDetails->male_astro_details->Vashya;
							?>
						</td>
						<td class="text-center text-bold-600">Vashya</td>
						<td align="center" class="text-info">
							<?php 
								echo $astroDetails->female_astro_details->Vashya;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $astroDetails->male_astro_details->Yoni;
							?>
						</td>
						<td class="text-center text-bold-600">Yoni</td>
						<td align="center" class="text-info">
							<?php 
								echo $astroDetails->female_astro_details->Yoni;
							?>
						</td>
					</tr>
					<tr>
						<td align="center" class="text-primary">
							<?php 
								echo $astroDetails->male_astro_details->Gan;
							?>
						</td>
						<td class="text-center text-bold-600">Gan</td>
						<td align="center" class="text-info">
							<?php 
								echo $astroDetails->female_astro_details->Gan;
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-5 m-3">
 		<div class="">
			<div class="clearfix overflow-hidden panchang card-header">
				<div class="col-xs-12">
					<h4 class="type--uppercase unmarg" style="padding: 10px 0">Match Summary </h4>
				</div>
			</div>
			<div class="">
				<div class="col-xs-12 m-2">
					<span class="type--bold">Male Nakshatra</span>
					<p class=" unmarg--bottom">
						<?php echo $astroDetails->male_astro_details->Naksahtra ?>
					</p>
				</div>
			</div>
			<hr class="unmarg">
			<div class="">
				<div class="col-xs-12 m-2">
					<span class="type--bold">Female Nakshatra</span>
					<p class=" unmarg--bottom">
						<?php echo $astroDetails->female_astro_details->Naksahtra ?>
					</p>
				</div>
			</div>
			<hr class="unmarg">
			<div class=" col-xs-12 m-2">
				<span class="type--bold">Match Making Percentage</span>
				<div class="progress-horizontal progress-horizontal--lg m-t-5 m-b-5">
					<div class="progress-horizontal__bar col-xs-10" style="" data-value="78"data-color="#422443">
						<div class="progress-horizontal__progress" style="width: 78%;"></div>
						<div class="progress-horizontal__progress" style="width: 40%;"></div>
					</div>
					<span class="progress-horizontal__label h5 col-xs-2">
						<?php 
							$a=$ashtakootPoints->total->received_points;
							$b=$ashtakootPoints->total->total_points;
							$c= round(($a/$b)*100);
							echo $c."%";
						?>
					</span>
				</div>
			</div>
			<hr class="">
			<div class="col-xs-12 m-2">
				<h4>Matching Point</h4>
				<div class="rounded-circle" style="background-color: yellow;height:130px;width: 130px;">
					<p class="number" style="margin-left: 15%; padding-top: 19%; font-size: 40px;">
					<?php echo $ashtakootPoints->total->received_points."/".$ashtakootPoints->total->total_points ?>
					</p>
				</div>
			</div>
			<div class="card-header">
				<a href="#tag4" class="btn small-title width-100 border-none">
					<h4 class="color--white unmarg" style="padding: 5px 0">
						See Detailed Report
					</h4>
				</a>
			</div>
		</div>			
	</div>
</div>
<div class="portlet-title margin-bottom-0 m-4" id="tag4">
	<div class="caption">
		<h3 class="caption-subject text-left">Ashtakoot Points</h3>
		<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, #1863bb 10%, #bb59f9 100%);background-size:100% 5px ;">
		</div>
	</div>
</div>
<div class="row unmarg m-2">
	<div class="col-12 m-1">
		<div class="table-scrollable table-scrollable-borderless">
			<table class="table table-hover table-light hidden-xs">
				<thead>
					<tr class="card-header">
						<th class="text-center text-dark">Attribute</th>
						<th class="text-center text-dark">Description</th>
						<th class="text-center text-dark">Male</th>
						<th class="text-center text-dark">Female</th>
						<th class="text-center text-dark">Out of</th>
						<th class="text-center text-dark">Recieved</th>
					</tr>
				</thead>
				<tbody>
                	<?php foreach ($ashtakootPoints as $key => $value): ?>
                		<?php if (ucfirst($key)=='Total') { 
                			break;
                		}
                		else{
                		?>
                	<tr>
                		<td scope="row" class="text-bold-600"><?php echo ucfirst($key); ?></td>
                		<?php foreach($value as $values): ?>
            			<td scope="row">
            				<?php echo ucfirst($values) ?>
            			</td>
            			<?php endforeach; ?>	
                	</tr>
                	<?php } endforeach; ?>
                	<tr class="card-header">
                		<td scope="row" class="text-bold-600" style="color:white"><b>Total</b></td>
                		<td scope="row" style="color:white">-</td>
                		<td scope="row" style="color:white">-</td>
                		<td scope="row" style="color:white">-</td>
                		<td scope="row"><?php echo $ashtakootPoints->total->total_points ?></td>
                		<td scope="row"><?php echo $ashtakootPoints->total->received_points ?></td>
                	</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="portlet-title margin-bottom-0 m-4">
	<div class="caption">
		<h3 class="caption-subject text-left">Matching Report</h3>
		<div style="padding-bottom: 2px;background-image: linear-gradient( 135deg, #1863bb 10%, #bb59f9 100%);background-size:100% 5px ;">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-2 ml-4">
		<div class="rounded-circle" style="background-color: yellow;height:130px;width: 130px;">
			<p class="number" style="margin-left: 15%; padding-top: 19%; font-size: 40px;">
				<?php echo $ashtakootPoints->total->received_points."/".$ashtakootPoints->total->total_points ?>
			</p>
		</div>
		<h4>Ashtakoot</h4>
	</div>
	<div class="col-md-2 ml-4">
		<div class="rounded-circle" style="background-color: yellow;height:130px;width: 130px;">
			<p class="number" style="margin-left: 20%; padding-top: 19%; font-size: 40px;">
				<?php echo round($matchMakingReport->manglik->male_percentage)."%" ?>
			</p>
		</div>
		<h4>Male Manglik</h4>
	</div>
	<div class="col-md-2 ml-4">
		<div class="rounded-circle" style="background-color: yellow;height:130px;width: 130px;">
			<p class="number" style="margin-left: 20%; padding-top: 19%; font-size: 40px;">
				<?php echo round($matchMakingReport->manglik->female_percentage)."%" ?>
			</p>
		</div>
		<h4>Female Manglik</h4>
	</div>
	<div class="col-md-2 ml-4">
		<div class="rounded-circle" style="background-color: yellow;height:130px;width: 130px;">
			<p class="number" style="margin-left: 20%; padding-top: 19%; font-size: 40px;">
				<?php if($matchMakingReport->rajju_dosha->status==false){
					echo "NO";
				}else{
					echo "YES";
				} 
				?>
			</p>
		</div>
		<h4>Raju Dosha</h4>
	</div>
	<div class="col-md-2 ml-4">
		<div class="rounded-circle" style="background-color: yellow;height:130px;width: 130px;">
			<p class="number" style="margin-left: 20%; padding-top: 19%; font-size: 40px;">
				<?php if($matchMakingReport->vedha_dosha->status==false){
					echo "NO";
				}else{
					echo "YES";
				} 
				?>
			</p>
		</div>
		<h4>Vedha Dosha</h4>
	</div>
</div>
<div class="boxed m-4" style="color: #31708f;background-color: #d9edf7;border-color: #bce8f1;">
	<div class="col-xs-10 m-4">
		<h2 class="mb-3" style="color: #31708f">Match Conclusion</h2>
		<div class="content">
			<p style="color: #31708f;padding-bottom: 10px"><?php echo $matchMakingReport->conclusion->match_report ?></p>
		</div>
	</div>
</div>