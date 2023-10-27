<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/bootstrap.min.css">
<script src="<?php echo base_url();?>axxets/templates/insurance/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/bootstrap.min.js"></script>
  <script src='<?php echo base_url();?>axxets/templates/insurance/js/kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/healthsub.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
$(document).ready(function(){
  $("#plansBtn").click(function(){
			
			var selectedPlan = [];
			selectedPlan.push($('#sumInsure').val());
            $.each($("input[name='plans']:checked"), function(){
                selectedPlan.push($(this).val());
            });
			var selectedPlans=selectedPlan.join(",");	
			//$.post('<?php echo base_url();?>/compareplans/getPlansData', {suggest: selectedPlans}, function(result){
			$.post('<?php echo base_url();?>healthinsurance/getPlansData', {suggest: selectedPlans}, function(result){
			$('#plansTable').html(result);
    });
}); 
});
</script>
<script>
var clicked;
function update()
{
document.getElementById("selectedValue").value=clicked;
return true;
}
function updateTable(checkbox){
	var str=checkbox.name;
	var res = str.split("(");

	var x = document.getElementsByClassName(res[0]);
	for (i = 0; i < x.length; i++) {
		if(checkbox.checked)
		{
			x[i].style.display = '';
		}else
		{
			x[i].style.display = 'none';
		}
	}	
}
var count=0;
function getDetails(checkbox){
		if(checkbox.checked)
		{
			count++;
		}else
		{
			count--;
		}
        if(count>=2)
		{
		  document.getElementById("comparePlans").style.display = '';
		}else{
			document.getElementById("comparePlans").style.display = 'none';
		}
}
</script>
</head>
<body>
<!--<header>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#126185;font-size:medium;">
			<a class="navbar-brand mr-auto" href="#">
	  			<img class="img-fluid" style="height:50px;width: 200px;" src="<?php echo base_url();?>axxets/templates/insurance/images/brokerassist.png">
	 		</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
	 				<span  class="navbar-toggler-icon" style="border: none;"></span>
	 			</button>
	  		<div class="collapse navbar-collapse" id="collapse_Navbar">
	   			<ul class="navbar-nav ml-auto" style="margin-right: 30px;">
					<li class="nav-item">
	      				<a class="nav-link " href="#" style="color: #ffffff !important;"><span class="fa fa-home"></span>Home</a>&nbsp;
					</li>
					<li class="nav-item" >
						<a class="nav-link" href="#" style="color: #ffffff !important;"><span class="fa fa-bell"></span>Notifications</a>
					</li>
					<li class="nav-item" >
						<a class="nav-link n" href="#" style="color: #ffffff !important;"><span class="fa fa-envelope"></span>Reminder</a>
					</li>
					<li class="nav-item" >
						<a class="nav-link n" href="#" style="color: #ffffff !important;"><span class="fa fa-rupee"></span>Incentive</a>
					</li>
					<li class="nav-item" >
						<a class="nav-link n" href="#" style="color: #ffffff !important;"><span class="fa fa-sign-in"></span>Login</a>
					</li>
					
				</ul>
				 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			</div>
		</nav>
	</div>
</header>-->
<?php include 'header.php' ?>
<section class="main">
	<div class="content">
		<div class="row">
			<div class="col-lg-3 col-sm-12">
				<div class="container">
				    <div id="accordion" class="accordion">
				        <div class="card mb-0">
				            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
				                <a class="card-title">
				              		Details
				                </a>
				            </div>
				            <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
				            	<p><h5>Health Plans Hand Picked For You</h5></p>
								<!--<form class="text-center" style="padding-top: 30px;" action="<?php echo base_url();?>/healthinsurance/home"  method="post">
				                <p class="search text-center" >
				                	Modify Search &nbsp;<i class="fa fa-search" aria-hidden="true"></i>
				                </p>-->
								<!-- <p class="search text-center" onClick="javascript:history.go(-1)">
				                	Modify Search &nbsp;<i class="fa fa-search" aria-hidden="true"></i>
				                </p> -->
								
								</form>
				                <ul>
				                	<li><i class="fa fa-map" aria-hidden="true"></i>&nbsp;<span class="o"> Zone</span>&nbsp; -----&nbsp; <?php echo $city ;?> </li>
				                	<li><i class="fa fa-umbrella" aria-hidden="true"></i>&nbsp;<span class="o">	Sum Insured </span> -----&nbsp; <?php echo $sumInsure ;?></li>
									<li> 
										<i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo $memberDetails ?>
									</li>
				                </ul>
				            </div>
				        </div>
				    </div>
				     	<div id="accordion" class="accordion">
				            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				                <a class="card-title">
				                  Supplier
				                </a>
				            </div>
				            <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
				            	<br>
												<?php
												$array=explode(",",$suppliers);
												if(count($array)!=0)
												{
												foreach($array as $value)
												{?>
												<p>
				                	&nbsp;&nbsp;<input type="checkbox" name="<?php echo $value ?>" value="<?php echo $value ?>" checked="true" onchange="updateTable(this);" >&nbsp;<span class="acin"><?php echo $value ?>
				                 </span>
				                </p>
											<?php }
											}
											?>
				           	</div>
				     	</div>
				    
				</div>
			</div>
			<div class="col-lg-9 col-sm-12">
			<form class="text-center" style="padding-top: 30px;" action="<?php echo base_url();?>healthinsurance/getAddOnDetails"  method="post" onsubmit="return update();">
				<div>				
				<input type="hidden" name="transactionId" value="<?php echo $transactionId ?>"></input>	
				</div>
				<table class="table table-bordered" id="premiumTable">
				    <thead>
				      <tr>

				      </tr>
				    </thead>
				    <tbody>
					<tr style="display:none;" >
					<td><input type="hidden" name="memebers" value="<?php echo $members ;?>"></input><input type="hidden" name="sumInsure" id="sumInsure" value="<?php echo $sumInsure ;?>"></input><input type="hidden" name="selectedValue" id="selectedValue"></input>
					</input><input type="hidden" name="city" value="<?php echo $city ;?>" ></input>
					<input type="hidden" name="state" value="<?php echo $state ;?>" ></input><input type="hidden" name="pincodeNumber" value="<?php echo $pincodeNumber ;?>" ></input>
					<input name="xmlValue" value="<?php echo $xmlRequest ;?>"></input></td>
					</tr>
					<?php
					$i = 0;
					for($i=0;$i<$totalPolicies;$i++) { ?>
				      <tr class="<?php $supplierName='supplier'.$i; echo $$supplierName ?>">
				        <td style="width: 140px;" ><div><img src="<?php $imageURl='imageUrl'.$i;echo $$imageURl ;?>"></div></br><p><b><?php $planName='planName'.$i; echo $$planName ?><input type="hidden" name="<?php echo 'planName'.$i ?>" value="<?php $planName='planName'.$i; echo $$planName ?>"></input><input type="hidden" name="<?php echo 'supplierName'.$i ?>" value="<?php $supplierName='supplier'.$i; echo $$supplierName ?>"></input></b></br></br><input type="checkbox" name="plans" onchange="getDetails(this);" value="<?php echo $i ?>">&nbsp;Click to Compare</p></td>
				        <td style="width: 250px;"><ul class="text-center ">
				        	<li><span style="color:red">Sum Insured</span><span class="con"><i class="fa fa-rupee" aria-hidden="true"></i><?php $sumIsure='sumAssured'.$i; echo $$sumIsure ?></span></li>
				        	<li><span style="color:red">Basic Premium</span><span class="con"><i class="fa fa-rupee" aria-hidden="true"></i><?php $basicPremiumm='basicPremium'.$i; echo $$basicPremiumm ?></span><input type="hidden" name="<?php echo 'basicPremium'.$i ?>" value="<?php $basicPremiumm='basicPremium'.$i; echo $$basicPremiumm ?>"></input></li>
				        	<li><span style="color:red">GST</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i><?php $GSTAmount='GST'.$i; echo $$GSTAmount ?></span></li>
				        </ul>
				    	</td>
				        <td><div class="row">
					      		<div class="col-sm-4 offset-0">
					      			Medical Requirement
					      		</div>
					      		<div class="col-sm-8">
					      			<?php $medical='medReqDetails'.$i; echo $$medical ?>
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		No Claim Bonus
					      		</div>
					      		<div class="col-sm-8">
					      			<?php $claimBonus='claimDetails'.$i; echo $$claimBonus ?>
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		Room Limit
					      		</div>
					      		<div class="col-sm-8">
					      		<?php $roomLimit='roomLimitDetails'.$i; echo $$roomLimit ?>
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		Waiting period to cover Pre-Existing ailments
					      		</div>
					      		<div class="col-sm-8">
					      			<?php $waitingPeriod='waitingPeriodDetails'.$i; echo $$waitingPeriod ?>
					      		</div>
				      		</div> </td>
							<td style="width: 100px;"><div class="bn">
				        	<button class="btn btn-md btn-primary" onclick="clicked='<?php echo $i ?>';" name="<?php echo $i ?>" ><i class="fa fa-rupee"></i><?php $totalAmount='total'.$i; echo $$totalAmount ?>
							<input type="hidden" name="<?php echo 'total'.$i ?>" value="<?php $totalAmount='total'.$i; echo $$totalAmount ?>"></input>
							<input type="hidden" name="<?php echo 'planCode'.$i ?>" value="<?php $planCodeValue='planCode'.$i; echo $$planCodeValue ?>"></input>
							<br>Buy Now</button>
				        </div></td>						
				      </tr>
					<?php } ?>
				    </tbody>
  				</table>
				</form> 
			</div>
		</div>
	<div class="row" id="comparePlans" style="display:none;" >
			<div class="col-lg-6 offset-6">
				<div>
				
					<button class="btn btn-lg btn-primary" id="plansBtn" data-toggle="modal" data-target="#largeModal">
						Compare Plans
					</button>
				
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modalcontent">
	<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="LL">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Benefits</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
        	<table class="table" id="plansTable" >           
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php' ?>
</body>
</html>